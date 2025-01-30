<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Contacts</h5>
                <ul class="list-group">
             
                    @foreach ($userData as $user)
                        <li class="list-group-item">
                            <a href="#" class="contact" data-id="{{ $user->id }}">{{ $user->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <div id="messages" class="border p-3" style="height: 400px; overflow-y: scroll;"></div>
                <form id="messageForm">
                    @csrf
                    <input type="hidden" id="receiverId" name="receiver_id">
                    <div class="input-group mt-2">
                        <input type="text" id="messageInput" name="message" class="form-control" placeholder="Type your message">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        let receiverId;
    
        // Fetch messages on contact click
        document.querySelectorAll('.contact').forEach(contact => {
            contact.addEventListener('click', function () {
                receiverId = this.getAttribute('data-id');
                document.getElementById('receiverId').value = receiverId;
    
                fetch(`/messenger/messages/${receiverId}`)
                    .then(response => response.json())
                    .then(messages => {
                        const messagesDiv = document.getElementById('messages');
                        messagesDiv.innerHTML = '';
    
                        messages.forEach(message => {
                            const messageElement = document.createElement('div');
                            messageElement.textContent = `${message.sender_id === {{ Auth::id() }} ? 'You' : 'Them'}: ${message.message}`;
                            messagesDiv.appendChild(messageElement);
                        });
                    });
            });
        });
    
        // Send a new message
        document.getElementById('messageForm').addEventListener('submit', function (e) {
e.preventDefault();

const formData = new FormData(this);
fetch('/messenger/messages', {
method: 'POST',
body: formData,
headers: {
  'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Add CSRF token
},
})
.then(response => response.json())
.then(message => {
const messagesDiv = document.getElementById('messages');
const messageElement = document.createElement('div');
messageElement.textContent = `You: ${message.message}`;
messagesDiv.appendChild(messageElement);

document.getElementById('messageInput').value = '';
})
.catch(error => console.error(error));
});
    </script>


</x-app-layout>



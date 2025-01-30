<x-app-layout>

    <section  style="  background-image: linear-gradient(lightblue,white);">
        <div class="container py-5" >
         
      
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                <center> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;"> </center> 
                  <h5 class="my-3">{{$userData[0]->name}}</h5>
                  {{-- <p class="text-muted mb-1">Full Stack Developer</p>
                  <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                  <div class="d-flex justify-content-center mb-2">


                  <form action="/followed" method="GET">
    @csrf
    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
    <input type="hidden" name="following_id" value="{{$userData[0]->id}}">
    <input type="hidden" name="follower_name" value="{{Auth::user()->name}}">
    <input type="hidden" name="following_name" value="{{$userData[0]->name}}">

   
   @if ($following && $following->following_id == $userData[0]->id)
     
   
  &nbsp;&nbsp;<button type="submit" class=" follow-btn btn btn-outline follow-button  " style="height:40px;width:120px;"><span id="follow"> FOLLOWING</span></button> 

  @else
  &nbsp;&nbsp;<button type="submit" class=" follow-btn btn btn-primary follow-button  " style="height:40px;width:100px;"><span id="follow"> FOLLOW</span></button> 

  @endif
 


</form>


                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0">https://mdbootstrap.com</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg text-body"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                      <p class="mb-0">@mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              
            
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
              




             
            </div>
          </div>
        </div>
      </section>

</x-app-layout>
<x-app-layout>

    <div class="card" style="padding-left: 0px">
        <div class="card-body" >
           <h5 class="card-title">Search</h5>
           <ul class="list-group">
              @foreach ( $results as $user )
              <a href="\user_profile\{{$user->id}}">
              <li class="list-group-item d-flex align-items-center">
                 <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 80px;">
                 {{$user->name}}
              </li>
              </a>
              @endforeach
           </ul>
        </div>
     </div>



</x-app-layout>


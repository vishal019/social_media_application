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


                    @if ($following && $following->following_id == $userData[0]->id)
                    <!-- Unfollow Form -->
                    <form action="{{ route('unfollow') }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="following_id" value="{{ $userData[0]->id }}">
                        <button type="submit" class="follow-btn btn btn-outline-danger follow-button" style="height:40px;width:120px;">
                            <span id="unfollow">UNFOLLOW</span>
                        </button>
                    </form>
                @else
                    <!-- Follow Form -->
                    <form action="{{ route('follow') }}" method="get" style="display:inline;">
                        @csrf
                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="following_id" value="{{ $userData[0]->id }}">
                        <input type="hidden" name="follower_name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="following_name" value="{{ $userData[0]->name }}">
                        <button type="submit" class="follow-btn btn btn-primary follow-button" style="height:40px;width:100px;">
                            <span id="follow">FOLLOW</span>
                        </button>
                    </form>
                @endif
                


                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0"></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg text-body"></i>
                      <p class="mb-0"></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                      <p class="mb-0"></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                      <p class="mb-0"></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                      <p class="mb-0"></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$userData[0]->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$userData[0]->email}}</p>
                    </div>
                  </div>
                  <hr>
                 
                 
                
                 
                </div>
              </div>
              <div class="row">
               

                {{-- end here --}}
              </div>


            </div>
          </div>
        </div>
      </section>

</x-app-layout>
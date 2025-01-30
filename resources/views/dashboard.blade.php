<x-app-layout>
  <x-slot name="header">
     {{-- 
     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
     --}}
     {{-- {{ __('Dashboard') }} --}}
     <!-- MDB -->
     <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.2.0/mdb.umd.min.js"
        ></script>
     <div class="container-fluid" >
        <!-- Header -->
        <div class="row mt-3">
           <!-- Sidebar -->
           <div class="col-md-3 scrollable-div " id="following" style="padding-left:0">
              <div class="card" style="padding-left: 0px">
                 <div class="card-body" >
                    <h5 class="card-title">Following</h5>
                    <ul class="list-group">
                       @foreach ( $following as $user )
                       <li class="list-group-item d-flex align-items-center">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                             class="rounded-circle img-fluid" style="width: 80px;">
                          {{$user->following_name}}
                       </li>
                       @endforeach
                    </ul>
                 </div>
              </div>
           </div>
           <!-- Main Content -->
           <div class="col-md-6 scrollable-div" style="padding-top: 0px">
           
            <!-- Tab Content -->
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content:center">
               <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="creative-tab" data-bs-toggle="tab" data-bs-target="#creative" type="button" role="tab" aria-controls="creative" aria-selected="true">Creative</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="style-tab" data-bs-toggle="tab" data-bs-target="#style" type="button" role="tab" aria-controls="style" aria-selected="false">Style</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="beauty-tab" data-bs-toggle="tab" data-bs-target="#beauty" type="button" role="tab" aria-controls="beauty" aria-selected="false">Beauty</button>
               </li>
            </ul>
         
            <div class="tab-content mt-4" id="myTabContent">
               <div class="tab-pane fade show active" id="creative" role="tabpanel" aria-labelledby="creative-tab">
                  <div class="card mb-2">
                     <div class="card-body">
                        {{-- creative page  --}}
                       
                        @foreach ( $creative_data as $c_Data )
<div class="post-card">
   <!-- Post Header -->
   <div class="post-header">
      <img src="{{ asset('storage/logo2.png') }}" alt="Profile">
      <div>
         <h6>{{$c_Data->username}}</h6>
         <p class="text-muted mb-0" style="font-size: 14px;">@ {{$c_Data->username}} </p>
      </div>
   </div>
   <!-- Post Content -->
   <div class="post-content">
      {{$c_Data->description}}
   </div>
   <!-- Post Image -->
   <div class="post-image">
      @if (in_array($c_Data->extension, ['jpg', 'jpeg', 'png', 'gif']))
      <img src="{{ url('storage/'.$c_Data->photo_or_video) }}" alt="Post">
      @elseif ($c_Data->extension == "mp4")
      <video id="videoPlayer" controls >
         <source src="{{ url('storage/'.$c_Data->photo_or_video) }}" type="video/mp4">
         Your browser does not support the video tag.
      </video>
      @else
      <p>video not supported</p>
      @endif
   </div>
   <!-- Post Actions -->
   <div class="post-actions">
    <form action="posts/{{$c_Data->id}}/likes" method="POST">
       @csrf
       <input type="hidden" name="" value="{{$c_Data->id}}">
      <button type="submit" ><i class="fa-solid fa-thumbs-up"></i>{{count($c_Data->likes)}}</button>


    </form>
   
     <a href="comment/{{$c_Data->id}}"> <button type="button" class="btn btn-primary"><i class="fa-solid fa-comment"></i>comment </button></a>
    

      
      </div>
      <!-- Bootstrap JS Bundle -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      {{-- <button><i class="fa-solid fa-share"></i> Share</button> --}}
   </div>
{{-- </div> --}}
@endforeach
                   
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
                     </div>
                  </div>
               </div>
          
          
               <div class="tab-pane fade" id="style" role="tabpanel" aria-labelledby="style-tab">
                  <div class="card mb-2">
                     <div class="card-body">
                        @foreach ( $style_data as $s_Data )
                        <div class="post-card">
                           <!-- Post Header -->
                           <div class="post-header">
                              <img src="{{ asset('storage/logo2.png') }}" alt="Profile">
                              <div>
                                 <h6>{{$s_Data->username}}</h6>
                                 <p class="text-muted mb-0" style="font-size: 14px;">@ {{$s_Data->username}} </p>
                              </div>
                           </div>
                           <!-- Post Content -->
                           <div class="post-content">
                              {{$s_Data->description}}
                           </div>
                           <!-- Post Image -->
                           <div class="post-image">
                              @if (in_array($s_Data->extension, ['jpg', 'jpeg', 'png', 'gif']))
                              <img src="{{ url('storage/'.$s_Data->photo_or_video) }}" alt="Post">
                              @elseif ($c_Data->extension == "mp4")
                              <video id="videoPlayer" controls >
                                 <source src="{{ url('storage/'.$s_Data->photo_or_video) }}" type="video/mp4">
                                 Your browser does not support the video tag.
                              </video>
                              @else
                              <p>video not supported</p>
                              @endif
                           </div>
                           <!-- Post Actions -->
                           <div class="post-actions">
                            <form action="posts/{{$s_Data->id}}/likes" method="POST">
                               @csrf
                               <input type="hidden" name="" value="{{$s_Data->id}}">
                              <button type="submit" ><i class="fa-solid fa-thumbs-up"></i>{{count($s_Data->likes)}}</button>
                        
                        
                            </form>
                            <a href="comment/{{$s_Data->id}}"> <button type="button" class="btn btn-primary"><i class="fa-solid fa-comment"></i>comment </button></a>
                              <!-- Modal -->
                              <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 0">Close</button>
                                          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                       </div>
                                       <div class="modal-body">
                                          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                                         
                                          <div class="container">
                                             <!-- Tweet Card -->
                        
                        
                                            
                                
                                                <hr class="border-secondary">
                                                <div class="d-flex align-items-start">
                                                   <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="Your Profile" class="profile-img me-2">
                                                   <form action="/posts/{{$s_Data->id}}/comments" method="post">
                                                      @csrf
                                                      <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                                      <input type="hidden" name="post_id" value="{{$s_Data->id}}">
                                                      <input type="text" class="flex-grow-1 reply-box" name="comment" placeholder="Post your reply" required>
                                                </div>
                                                <div class="d-flex justify-content-end mt-2">
                                                <button type="submit" class="reply-btn">Comment</button>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- Bootstrap JS -->
                                          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Bootstrap JS Bundle -->
                              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                              {{-- <button><i class="fa-solid fa-share"></i> Share</button> --}}
                           </div>
                        <!-- </div> -->
                        @endforeach
                     </div>
                  </div>
          
                  
               </div>
          
          
               <div class="tab-pane fade" id="beauty" role="tabpanel" aria-labelledby="beauty-tab">
                <div class="card mb-2">
                   <div class="card-body">
                     
                   
                     @foreach ( $beauty_data as $b_Data )
                     <div class="post-card">
                        <!-- Post Header -->
                        <div class="post-header">
                           <img src="{{ asset('storage/logo2.png') }}" alt="Profile">
                           <div>
                              <h6>{{$b_Data->username}}</h6>
                              <p class="text-muted mb-0" style="font-size: 14px;">@ {{$b_Data->username}} </p>
                           </div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                           {{$b_Data->description}}
                        </div>
                        <!-- Post Image -->
                        <div class="post-image">
                           @if (in_array($b_Data->extension, ['jpg', 'jpeg', 'png', 'gif']))
                           <img src="{{ url('storage/'.$c_Data->photo_or_video) }}" alt="Post">
                           @elseif ($c_Data->extension == "mp4")
                           <video id="videoPlayer" controls >
                              <source src="{{ url('storage/'.$b_Data->photo_or_video) }}" type="video/mp4">
                              Your browser does not support the video tag.
                           </video>
                           @else
                           <p>video not supported</p>
                           @endif
                        </div>
                        <!-- Post Actions -->
                        <div class="post-actions">
                         <form action="posts/{{$b_Data->id}}/likes" method="POST">
                            @csrf
                            <input type="hidden" name="" value="{{$b_Data->id}}">
                           <button type="submit" ><i class="fa-solid fa-thumbs-up"></i>{{count($b_Data->likes)}}</button>
                     
                     
                         </form>
                         <a href="comment/{{$b_Data->id}}"> <button type="button" class="btn btn-primary"><i class="fa-solid fa-comment"></i> comment </button></a>
                           <!-- Modal -->
                           <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 0">Close</button>
                                       {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                    </div>
                                    <div class="modal-body">
                                       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                                      
                                       <div class="container">
                     
                                             <hr class="border-secondary">
                                             <div class="d-flex align-items-start">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="Your Profile" class="profile-img me-2">
                                                <form action="/posts/{{$b_Data->id}}/comments" method="post">
                                                   @csrf
                                                   <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                                   <input type="hidden" name="post_id" value="{{$b_Data->id}}">
                                                   <input type="text" class="flex-grow-1 reply-box" name="comment" placeholder="Post your reply" required>
                                             </div>
                                             <div class="d-flex justify-content-end mt-2">
                                             <button type="submit" class="reply-btn">Comment</button>
                                             </div>
                                             </form>
                                          </div>
                                       </div>
                                       <!-- Bootstrap JS -->
                                       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Bootstrap JS Bundle -->
                           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                           {{-- <button><i class="fa-solid fa-share"></i> Share</button> --}}
                        </div>
                     <!-- </div> -->
                     @endforeach
                    
                   </div>
                </div>
             </div>
              
            </div>
           
              
           </div>



           <div class="col-md-3 scrollable-div" id="cardscroll" data-mdb-perfect-scrollbar="true">
            <div class="card">
               <div class="d-flex justify-content-between mb-4" style="padding-left: 0%">
                  <h5>Browse</h5>
                  &nbsp;&nbsp;
                  <button id="toggleView" class="btn"><i class="fa-solid fa-repeat"></i></button>&nbsp;&nbsp;
                  <h5>Message</h5>
                  &nbsp;
               </div>
               <div class="card-body" data-mdb-perfect-scrollbar="true" style="padding-top: 0px">
                 
                  <!-- Browse View -->
                  <div id="browseView" class="view-container browse-view active-view">
                     <ul class="list-group">
                        @foreach ( $data as $user )
                        <a href="\user_profile\{{$user->id}}">
                           <li class="list-group-item d-flex align-items-center">
                              <div class="row">
                                 <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 80px;">
                                 {{$user->name}}
                                 &nbsp;&nbsp;
                                 <br>
                              </div>
                           </li>
                        </a>
                        @endforeach
                     </ul>
                  </div>
                  <!-- Message View -->
                  <div id="messageView" class="view-container message-view">
                     <div>
                        <div data-mdb-perfect-scrollbar="true" style="position: relative; height:auto">
                           <ul class="list-group">
                              @foreach ( $data as $user )
                              <li class="list-group-item d-flex align-items-center">
                                 <div class="row">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="Profile Image" style="height: 50px;width:70px" class="profile-img me-2">
                                    {{$user->name}}
                                    &nbsp; <br>
                                    <a href="/messenger/{{$user->id}}"> <button class="btn btn-primary" style="height:30px;width:100px;" >Message</button></a>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
                  {{-- 
               </div>
               --}}
               <!-- Bootstrap JS Bundle -->
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
               <script>
                  const toggleButton = document.getElementById("toggleView");
                  const browseView = document.getElementById("browseView");
                  const messageView = document.getElementById("messageView");
                  
                  toggleButton.addEventListener("click", () => {
                    if (browseView.classList.contains("active-view")) {
                      browseView.classList.remove("active-view");
                      messageView.classList.add("active-view");
                      
                    } else {
                      messageView.classList.remove("active-view");
                      browseView.classList.add("active-view");
                     
                    }
                  });
               </script>
            </div>
         </div>




        </div>

      

       


       





    
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Right Panel -->



        
   
                </div>

                
     </div>
    
    
     </div>
  

     <style>



.scrollable-div {
                   height: 500px; /* Set a fixed height */
                   overflow-y: auto; /* Enables vertical scrollbar */
                   border: 1px solid #ddd;
                   padding: 10px;
               }

               .scrollable-div::-webkit-scrollbar {
    width: 8px; /* Width of the scrollbar */
}

.scrollable-div::-webkit-scrollbar-thumb:hover {
    background: #555; /* Even darker gray */
}

@media (max-width: 766px) { /* Hide div when screen is larger than 768px */
   #following {
        display: none !important;
    }
    #cardscroll {
        display: none !important;
    }
}

      .post-card {
      max-width: 700px;
      margin: 20px auto;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .post-header {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px;
      }
      .post-header img {
      border-radius: 50%;
      width: 50px;
      height: 50px;
      object-fit: cover;
      }
      .post-content {
      padding: 15px;
      }
      .post-image {
      position: relative;
      text-align: center;
      }
      .post-image img {
      width: 100%;
      border-bottom: 1px solid #ddd;
      }
      .post-image .overlay-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
      }
      .profiles-row {
      display: flex;
      justify-content: space-around;
      padding: 10px;
      }
      .profile-card {
      text-align: center;
      flex: 1;
      padding: 10px;
      }
      .profile-card img {
      border-radius: 50%;
      width: 70px;
      height: 70px;
      object-fit: cover;
      }
      .profile-card span {
      display: block;
      font-size: 14px;
      }
      .post-actions {
      padding: 10px 15px;
      display: flex;
      justify-content: space-between;
      }
      .post-actions button {
      background: none;
      border: none;
      color: #6c757d;
      font-size: 16px;
      cursor: pointer;
      }
      .post-actions button:hover {
      color: #000;
      }

      .view-container {
                    /* height: 300px; */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #f8f9fa;
                    border: 1px solid #ddd;
                    }
                    .browse-view {
                    display: none;
                    }
                    .message-view {
                    display: none;
                    }
                    .active-view {
                    display: block;
                    }
                    .toggleView{
                    color: transparent;
                    }

                    .tweet-card {
                                                  background-color: #fafcfd;
                                                  color: rgb(14, 14, 14);
                                                  /* border-radius: 10px; */
                                                  padding: 15px;
                                                  margin: 20px auto;
                                                  max-width: 600px;
                                                  /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); */
                                                  }
                                                  .profile-img {
                                                  width: 48px;
                                                  height: 48px;
                                                  border-radius: 50%;
                                                  }
                                                  .reply-box {
                                                  border-radius: 20px;
                                                  background-color: #c2c6c9;
                                                  color: rgb(11, 11, 11);
                                                  border: none;
                                                  padding: 10px 15px;
                                                  }
                                                  .reply-btn {
                                                  background-color: #1da1f2;
                                                  color: white;
                                                  border: none;
                                                  border-radius: 20px;
                                                  padding: 8px 16px;
                                                  cursor: pointer;
                                                  }
                                                  .reply-btn:hover {
                                                  background-color: #1991da;
                                                  }
   </style>
  </x-slot>
</x-app-layout>
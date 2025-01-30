<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->

    <div>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.2.0/mdb.umd.min.js"
></script>



    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


    
        <div class="flex justify-between h-16">
          
            <div class="flex">
                <!-- Logo -->
                
                <div class="shrink-0 flex items-center">
                    
                    <a href="{{ route('dashboard') }}">

                        <img src="{{ asset('storage/logo2.png') }}" style="height:70px;width:70px;padding-bottom:10px;padding-top:10px" alt="Image">



                    </a>
                  
                     
                      <form action="{{route('search')}}" method="get" style="display: flex">
                        @csrf
                      
                      <input type="search" class="form-control rounded" id="search" name="search"  placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit"  class="btn btn-outline-primary" id="search-button" data-mdb-ripple-init><i class="fa-solid fa-magnifying-glass"></i></button>

                  </form>
              
                   &nbsp;&nbsp;&nbsp;
                   
                      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


                    <style>
@media (min-width: 766px) { /* Hide div when screen is larger than 768px */
   #search {
        display: none !important;
    }
  #search-button {
        display: none !important;
    }
   
   

 
}


                    </style>

                    
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                      Qoeens
                    </x-nav-link>
                 
                    <div class="input-group" style="padding-top: 20px;">
                        <button type="button"   class="btn btn-light" style="height:35px" data-mdb-ripple-init data-mdb-ripple-color="dark">$100K Challanges</button> &nbsp;&nbsp;&nbsp;



                        <button type="button" class="btn btn-primary" style="height:35px" data-mdb-ripple-init data-bs-toggle="modal" data-bs-target="#myModal"> Create Post</button>&nbsp;&nbsp;&nbsp;

                        
                            
                          
                         
                         
                         
                          <!-- Modal Structure -->
                          <div class="modal fade create-post-modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                          
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myModalLabel">Create Post</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                          
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <form action="post_created" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label class="form-label" for="textAreaExample">What's on your mind?</label>
                                        <textarea class="form-control" id="textAreaExample" rows="4" placeholder="Write Here..." name="descrption"></textarea> <br>
                                        <select class="form-select" aria-label="Default select example" name="category">
                                            <option selected disabled>Select Category</option>
                                            <option value="1">Creative</option>
                                            <option value="2">Style</option>
                                            <option value="3">Beauty</option>
                                          </select>
                                          <br>
                                         
                                          <style>
                                            .media-preview img, .media-preview video {
      max-width: 100%;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .media-preview {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .media-preview > div {
      max-width: 200px;
    }
                                          </style>
                                          <h5>Attach file Here</h5>
                                            <div class="media-preview mb-3" id="mediaPreview"></div>
                                            <div>
                                              <label for="attachFile" class="btn btn-primary">Attach File</label>
                                              <input type="file" id="attachFile" class="d-none" multiple accept="image/*,video/*" name="imgorvideo">
                                            </div>
                                          
                                          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
                                        <script>
                                          const fileInput = document.getElementById('attachFile');
  const mediaPreview = document.getElementById('mediaPreview');

  fileInput.addEventListener('change', function () {
    // Clear previous previews
    mediaPreview.innerHTML = '';

    Array.from(fileInput.files).forEach(file => {
      const fileReader = new FileReader();

      fileReader.onload = function (e) {
        const fileURL = e.target.result;
        const previewDiv = document.createElement('div');

        if (file.type.startsWith('image/')) {
          const img = document.createElement('img');
          img.src = fileURL;
          previewDiv.appendChild(img);
        } else if (file.type.startsWith('video/')) {
          const video = document.createElement('video');
          video.src = fileURL;
          video.controls = true;
          previewDiv.appendChild(video);
        }

        mediaPreview.appendChild(previewDiv);
      };

      fileReader.readAsDataURL(file);
    });
  });  
                                   </script> 

                                </div>
                          
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">Post</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Bootstrap Bundle with Popper -->
                          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




                          <form action="{{route('search')}}" method="get" style="display: flex;padding-bottom:10px">
                            @csrf
                          
                          <input type="search" class="form-control rounded" style="width: 400px"  name="search"  placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit"  class="btn btn-outline-primary"  data-mdb-ripple-init><i class="fa-solid fa-magnifying-glass"></i></button>
    
                      </form>
                      </div>
                    

                    
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
               Qoeens
                <div class="input-group" style="padding-top: 20px;">
                    <button type="button"   class="btn btn-light" style="height:35px" data-mdb-ripple-init data-mdb-ripple-color="dark">$100K Challanges</button> &nbsp;&nbsp;&nbsp;
         

                   
                  </div>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

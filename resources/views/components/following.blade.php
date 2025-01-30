<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        
       
        <div class="row mt-3">
            <!-- Sidebar -->
            <div class="col-md-3" style="padding-left:0">
                <div class="card" style="padding-left: 0px">
                    <div class="card-body" >
                        <h5 class="card-title">Following</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <div class="rounded-circle bg-secondary me-3" style="width: 40px; height: 40px;"></div>
                                User 1
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <div class="rounded-circle bg-secondary me-3" style="width: 40px; height: 40px;"></div>
                                User 2
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <div class="rounded-circle bg-secondary me-3" style="width: 40px; height: 40px;"></div>
                                User 3
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Creative</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Style</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Beauty</a>
                            </li>
                        </ul>

                        <div class="mt-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">this is the creative section</h5>
                                    <p class="card-text">Content goes here...</p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Short trailer videos</h5>
                                    <p class="card-text">Content goes here...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="padding-top: 0px">
                      
                      

                    
    <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-top: 0px">
      <h5>Browse</h5>
      <button id="toggleButton" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left-right"></i>
      </button>
      <h5>Message</h5>
    </div>
    <div id="box" class="p-9 border">
      {{-- Default component is Browser --}}
      <x-browser />
    </div>
  </div>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleButton = document.getElementById("toggleButton");
    const box = document.getElementById("box");

    const browserComponent = `@component('components.browser')@endcomponent`;
    const chatComponent = `@component('components.chat')@endcomponent`;

    toggleButton.addEventListener("click", () => {
      // Toggle between components
      if (box.innerHTML.trim() === browserComponent.trim()) {
        box.innerHTML = chatComponent; // Load Chat component
      } else {
        box.innerHTML = browserComponent; // Load Browser component
      }
    });
  </script>

                    </div>
                       
                   
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    
</body>
</html>

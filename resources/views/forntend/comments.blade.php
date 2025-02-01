<x-app-layout>
    
    <section style="background-color: #eee;">
        <div class="container my-5 py-5">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
              <div class="card">

                @foreach ($comments as $comment) 
                    
                
                <div class="card-body">
                  <div class="d-flex flex-start align-items-center">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src="{{ asset('storage/logo2.png') }}" alt="avatar" width="60"
                      height="60" />
                    <div>
                      <h6 class="fw-bold text-primary mb-1">{{ \App\Models\User::where('id', $comment->user_id)->first()->name}}</h6>
                      <p class="text-muted small mb-0">
                      {{$comment->created_at}}
                      </p>
                    </div>
                  </div>
      
                  <p class="mt-3 mb-4 pb-2">
                {{$comment->content}}
                  </p>
      
              
                </div>
                @endforeach


                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                  <div class="d-flex flex-start w-100">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src="{{ asset('storage/logo2.png') }}" alt="avatar" width="80"
                      height="40" />
                     
                      <form action="/posts/{{$post_id}}/comments" method="post">
                        @csrf
                    <div data-mdb-input-init class="form-outline w-100">
                        
                        <input type="text" class="flex-grow-1 reply-box" name="comment" placeholder="Post your reply" required>
                     
                      <input type="hidden" name="post_id" value="{{$post_id}}">
                    </div>
                  </div>
                  <div class="float-end mt-2 pt-1">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Post comment</button>
                  
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


</x-app-layout>
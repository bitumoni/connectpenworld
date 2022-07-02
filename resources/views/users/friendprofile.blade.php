@extends('layouts.app')

@section('userprofile')

<section class="h-100 gradient-custom-2 ">
    <div class="container  h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
    <!--  <div class="col col-lg-9 col-xl-7">-->
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
                <div class="d-flex text-black">
                  <div class="flex-shrink-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                      alt="Generic placeholder image" class="img-fluid"
                      style="width: 180px; border-radius: 10px;">
                  </div>
                  <div class="flex-grow-1 ms-3 ">
                      <h5 class="mb-1"> {{$username}}  </h5>
                      <p class="mb-2 pb-1" style="color: #2b2a2a;">{{$userrole}}</p>
                     
                  </div>
                </div>
                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                style="background-color: #efefef;">
                <div>
                    <p class="small text-muted mb-1">Posts</p>
                    <p class="mb-0">{{$post}}</p>
                </div>
                <div class="px-3">
                    <p class="small text-muted mb-1"> Followers </p>
                    <p class="mb-0">{{$follow}}</p>
                </div>
                <div>
                    <p class="small text-muted mb-1">Following</p>
                    <p class="mb-0"> {{$following}} </p>
                </div>
            </div>
            <div class="d-flex pt-1">
                <button type="button" class="btn btn-outline-primary me-1 flex-grow-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Post</button>
                <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
  
            </div>
              </div>
  
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
               
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5> {{$username}}</h5>
                <p>{{$userrole}}</p>
              </div>
            </div>
            
            <div class="card-body p-4 text-black">
              <div class="mb-5">
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
              style="z-index: 1;">
              Edit profile
            </button>
                <p class="lead fw-normal mb-1">About</p>
                
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">Web Developer</p>
                  <p class="font-italic mb-1">Lives in New York</p>
                  <p class="font-italic mb-0">Photographer</p>
                </div>
              </div>
              
             <!-- <div class="p-4 text-black" style="background-color: #f8f9fa;">-->
                <div class="p-4 text-black">
                <div class="d-flex justify-content-end text-center py-1">
                    
                  <div>
                    <p class="mb-1 h5">{{$post}}</p>
                    <p class="small text-muted mb-0">Posts</p>
                  </div>
                  <div class="px-3">
                    <p class="mb-1 h5">{{$follow}}</p>
                    <p class="small text-muted mb-0">Followers</p>
                  </div>
                  <div>
                    <p class="mb-1 h5">{{$following}}</p>
                    <p class="small text-muted mb-0">Following</p>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Recent photos</p>
                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
              </div>
              <div class="row g-2">
                <div class="col mb-2">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
                <div class="col mb-2">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
              </div>
              <div class="row g-2">
                <div class="col">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
                <div class="col">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!--try-->

<section class="vh-100 bg-grey bg-gradient">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-top h-100">
        <div class="col col-md-9 col-lg-7 col-xl-5">
          <div class="card" style="border-radius: 15px;">
                     </div>
        </div>
      </div>
    </div>
  </section>

  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!--End Modal -->

  

           

@endsection
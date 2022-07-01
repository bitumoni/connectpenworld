@extends('layouts.app')


@section('posts')

<section class="py-5">
   
                <div class="container px-5 my-5">
                    
                    <div class="row gx-5">
                         @foreach ($posts as $item )
                        <div class="col-lg-4 mb-5">
                           
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $item->post_category }}</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">{{ $item->post_title }}</h5></a>
                                   
                                    <p class="card-text mb-0">{{ $item->post_content }}</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">{{ $item->name }} </div>
                                                <div class="text-muted">{{ $item->created_at }}&middot; <!--6 min read--></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach 
                    </div>
                    <!-- Call to action-->
                    
                </div>
               
            </section>
            
@endsection



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <aside class="bg-dark bg-gradient  p-4 p-sm-5 ">
         

            <form method="POST" action="{{ route('post') }}">
                @csrf

            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                
                <input class="form-control mb-2" name="post_user_id" type="hidden" placeholder="Title" value="{{ Auth::user()->id }}" />

                <div class="mb-4 mb-xl-0">
                
                <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                    <div>
                        <textarea type="text" class="form-control" name="post_content" id="editor"  required></textarea>
                    </div>
                <script>CKEDITOR.replace('editor')</script>
                <br>
                <center><div class="fs-3 fw-bold text-white-50">Type your story to the world</div></center>
                    
                </div>
                


                <div class="ms-xl-4">

                
                
                <center> <div class="fs-3 fw-bold text-white">Connect Pen</div></center>
                    
                
                    
                        <input class="form-control mb-2" name="post_title" type="text" placeholder="Title" required />
                        
                    

                    <select class="form-select mb-2" name="post_category" required>
                            <option value="0" disabled="" selected="">Select Category</option><option value="Fantasy">Fantasy</option><option value="Epic Fantasy">Epic Fantasy</option><option value="Science Fiction">Science Fiction</option><option value="Sci-fi Fantasy">Sci-fi Fantasy</option><option value="Dystopian">Dystopian</option><option value="Horror / Thriller">Horror / Thriller</option><option value="Romance">Romance</option><option value="Contemporary">Contemporary</option><option value="Historical">Historical</option>
                            <option value="Self-Help">Self-Help</option><option value="Memoir / Biography">Memoir / Biography</option><option value="Faith-based">Faith-based</option><option value="Art">Art</option><option value="History">History</option><option value="Health &amp; Wellness">Health &amp; Wellness</option><option value="Business">Business</option><option value="How-To / Guide Book">How-To / Guide Book</option>

                    </select>

                    <input type="text" class="form-control mb-2" name="post_keywords" placeholder="Keywords (quote, lyrics, movie, film script)">
                    <input class="form-control mb-2" type="text" name="post_language" placeholder="Language" required />

                    <br>
                    <div class="input-group md-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="post_privacy" id="inlineRadio1" value="public" required>
                                            <i class="bi bi-globe text-white">Public</i>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="post_privacy" id="inlineRadio2" value="friends" required>
                                            <i class="bi bi-people-fill text-white">Friends</i>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="post_privacy" id="inlineRadio3" value="only me" required>
                                            <i class="bi bi-person-fill text-white">Only me</i>
                                        </div>
                    </div>

                   <!-- <button type="submit" class="btn btn-primary">
                        {{ __('Post') }}
                    </button>-->

                    <div class="small text-white-50 mb-2">We care about privacy, and will never share your data.</div>
                 <center>
                        <button type="submit" class="btn btn-success btn-lg px-4 mb-2" >Post</button>
                      
                        @if(session()->has('message'))
                            <div class="alert alert-success mb-2">
                                {{ session()->get('message') }}
                            </div>
                        @endif


                        <div class="small text-white-50">------OR------</div>
                        
                        <button class="btn btn-primary btn-lg px-4" id="button-newsletter" type="button">Send to publisher</button>
                    
                </center>
                    
                </div>
                
                
            </div>
            </form>
       
</aside>
    </div>
</div>
@endsection


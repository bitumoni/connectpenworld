@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <aside class="bg-dark bg-gradient  p-4 p-sm-5 ">
            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                <div class="mb-4 mb-xl-0">
                
                <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                    <div>
                        <textarea type="text" class="form-control" name="casenote" id="editor" placeholder="Tell us about the incident" required></textarea>
                    </div>
                <script>CKEDITOR.replace('editor')</script>
                <br>
                <center><div class="fs-3 fw-bold text-white-50">Type your story to the world</div></center>
                    
                </div>
                


                <div class="ms-xl-4">

                
                
                <center> <div class="fs-3 fw-bold text-white">Connect Pen</div></center>
                    
                
                    
                        <input class="form-control mb-2" type="text" placeholder="Title" aria-label="Title" aria-describedby="button-newsletter" />
                        
                    

                    <select class="form-select mb-2" aria-label="Default select example">
                            <option value="0" disabled="" selected="">Select Category</option><option value="Fantasy">Fantasy</option><option value="Epic Fantasy">Epic Fantasy</option><option value="Science Fiction">Science Fiction</option><option value="Sci-fi Fantasy">Sci-fi Fantasy</option><option value="Dystopian">Dystopian</option><option value="Horror / Thriller">Horror / Thriller</option><option value="Romance">Romance</option><option value="Contemporary">Contemporary</option><option value="Historical">Historical</option>
                            <option value="Self-Help">Self-Help</option><option value="Memoir / Biography">Memoir / Biography</option><option value="Faith-based">Faith-based</option><option value="Art">Art</option><option value="History">History</option><option value="Health &amp; Wellness">Health &amp; Wellness</option><option value="Business">Business</option><option value="How-To / Guide Book">How-To / Guide Book</option>

                    </select>

                    <input type="text" class="form-control mb-2" name="keywords" placeholder="Keywords (quote, lyrics, movie, film script)">
                    <input class="form-control mb-2" type="text" placeholder="Language" aria-label="Language" aria-describedby="button-newsletter" />

                    <br>
                    <div class="input-group md-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male">
                                            <i class="bi bi-globe text-white">Public</i>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">
                                            <i class="bi bi-people-fill text-white">Friends</i>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="other">
                                            <i class="bi bi-person-fill text-white">Only me</i>
                                        </div>
                    </div>

                    <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                 <center>
                        <button class="btn btn-success btn-lg px-4" id="button-newsletter" type="button">Post</button>
                        <div class="small text-white-50">------OR------</div>
                        
                        <button class="btn btn-primary btn-lg px-4" id="button-newsletter" type="button">Send to publisher</button>
                    
                </center>
                    
                </div>
                
                
            </div>
</aside>
    </div>
</div>



         
@endsection

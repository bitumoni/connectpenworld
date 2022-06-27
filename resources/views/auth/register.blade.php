@extends('layouts.app')

@section('content')

<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          

            <aside class="bg-grey bg-gradient rounded-3 p-4 p-sm-5 mt-5">
            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                
                    <h1 class="display-5 fw-bolder text-white mb-2">CONNECT PEN</h1>
               
                    <div class="fs-3 fw-bold text-white">Largest Author Community</div>
                    <p class="lead fw-normal text-white-50 mb-4">Connect Pen helps you connect and share your thoughts with the people and earn money in your life.</p>
                    
                </div>
            </div>
            
            
            <form method="POST" action="{{ route('register') }}">
                @csrf   
            <div class="ms-xl-4">
                <div class="mb-4 mb-xl-0">
                    <select id="role" class="form-select mb-2" name="role" required>
                        <option selected disabled>Select Role</option>
                        <option value="author">Author</option>
                        <option value="publisher">Publisher</option>
                        <option value="investor">Investor</option>
                        <option value="admin">Admin</option>
                    </select>
                    <input id="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                    @error('name')
                        <span class="invalid-feedback mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback mb-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    
                    <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                    
                    <input id="phno" type="text" class="form-control mb-2 @error('phno') is-invalid @enderror" name="phno" placeholder="Mobile Number" value="{{ old('phno') }}" required autocomplete="phno" autofocus>

                    @error('phno')
                        <span class="invalid-feedback mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="dob" type="date" class="form-control mb-2 @error('date') is-invalid @enderror" name="dob" placeholder="DOB"  required autocomplete="dob" autofocus>
                       
                            <div class="input-group mb-2">
                                
                                
                                    


                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
                                            <label class="form-check-label text-white" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required>
                                            <label class="form-check-label text-white" for="inlineRadio2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other" required>
                                            <label class="form-check-label text-white" for="inlineRadio3">Other</label>
                                        </div>
                            </div>
                                <button class="btn  btn-success btn-lg px-4" type="submit">Sign Up</button>
                   
                    </div>
                </form>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <div class="small text-white-50">By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.</div>
                        
                    
                    </div>
                    <a class="text-decoration-none" id="forgot_password" type="text" href="/login">Already have an account?</a>
                </div>
            </div>
        </aside>
                
            
        </div>
    </div>
</header>


@endsection

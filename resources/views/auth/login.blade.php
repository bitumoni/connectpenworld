@extends('layouts.app')

@section('content')


<header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        
                        <aside class="bg-grey bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">

                                

                                <div class="mb-4 mb-xl-0">
                                        <div class="my-5 text-center text-xl-start">
                                            
                                            <h1 class="display-5 fw-bolder text-white mb-2">CONNECT PEN</h1>
                                    
                                            <div class="fs-3 fw-bold text-white">Largest Author Community</div>
                                            
                                            
                                        </div>
                                        
                                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">

                                        
                                        
                                             <a class="btn  btn-success btn-lg px-4" href="{{ route('register') }}">Create New Account</a>
                                        </div>
                                            <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                                </div>
                                
                                <div class="ms-xl-4 ">
                                                        
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                        <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                            
                                                
                                    <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    

                                            
                                   
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label text-white mb-2" for="remember">
                                            {{ __('Remember Me') }}
                                        </label><br>
                                        

                                            
                                                
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button><br>
                    
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                
                                            
                                </form>

                                       
                                        
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </header>
@endsection

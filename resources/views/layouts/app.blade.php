<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--socket Scripts -->
      <script src="{{ asset('js/app.js') }}" ></script>
      <script src="{{ asset('js/main.js') }}" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"
              integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      
    <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!--<link href="css/styles.css" rel="stylesheet" />-->

         <!--socket chat style-->
         <!-- <style>
            body { margin: 0; padding-bottom: 3rem; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
      
            #form { background: rgba(0, 0, 0, 0.15); padding: 0.25rem; position: fixed; bottom: 0; left: 0; right: 0; display: flex; height: 3rem; box-sizing: border-box; backdrop-filter: blur(10px); }
            #input { border: none; padding: 0 1rem; flex-grow: 1; border-radius: 2rem; margin: 0.25rem; }
            #input:focus { outline: none; }
            #form > button { background: #333; border: none; padding: 0 1rem; margin: 0.25rem; border-radius: 3px; outline: none; color: #fff; }
      
            #messages { list-style-type: none; margin: 0; padding: 0; }
            #messages > li { padding: 0.5rem 1rem; }
            #messages > li:nth-child(odd) { background: #efefef; }
          </style>-->
    
      <!--  <style>
            .chat-row{
                margin: 50px;
            }

            ul{
                margin: 0;
                padding:0;
                list-style:none;
            }

            ul li{
                padding:8px;
                background: #928787;
                margin-bottom:20px;
            }

            ul li:nth-child(2n-2){
                background: #c3c5c5;
            }

            .chat-input{
                border: 1 px soild lightgray;
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;
                padding:8px 10px;
            }


        </style>-->
    
            <!-- Styles
            <style>
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Nunito', sans-serif;
                    font-weight: 200;
                    height: 100vh;
                    margin: 0;
                }
                .full-height {
                    height: 100vh;
                }
                .flex-center {
                    align-items: center;
                    display: flex;
                    justify-content: center;
                }
                .position-ref {
                    position: relative;
                }
                .top-right {
                    position: absolute;
                    right: 10px;
                    top: 18px;
                }
                .content {
                    text-align: center;
                }
                .title {
                    font-size: 84px;
                }
                .links > a {
                    color: #636b6f;
                    padding: 0 25px;
                    font-size: 13px;
                    font-weight: 600;
                    letter-spacing: .1rem;
                    text-decoration: none;
                    text-transform: uppercase;
                }
                .m-b-md {
                    margin-bottom: 30px;
                }
            </style>
             -->

           {{--  <style>
                body { margin: 0; padding-bottom: 3rem; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
          
                #form { background: rgba(0, 0, 0, 0.15); padding: 0.25rem; position: fixed; bottom: 0; left: 0; right: 0; display: flex; height: 3rem; box-sizing: border-box; backdrop-filter: blur(10px); }
                #input { border: none; padding: 0 1rem; flex-grow: 1; border-radius: 2rem; margin: 0.25rem; }
                #input:focus { outline: none; }
                #form > button { background: #333; border: none; padding: 0 1rem; margin: 0.25rem; border-radius: 3px; outline: none; color: #fff; }
          
                #messages { list-style-type: none; margin: 0; padding: 0; }
                #messages > li { padding: 0.5rem 1rem; }
                #messages > li:nth-child(odd) { background: #efefef; }
              </style>
            --}}
             
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <!-- {{ config('app.name', 'Laravel') }}-->
                    CONNECT PEN
                </a>
                <div class="navbar-brand input-group">
                    <input class="form-control" type="text" placeholder="Type to search" aria-label="Type to search" aria-describedby="button-newsletter" />
                    <button class="btn btn-outline-dark" id="button-newsletter" type="button">Search</button>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                       
                        <a class="navbar-brand bi-chat-fill text-drak" href="/msg">Messages</a>
                        <a class="navbar-brand bi-bell-fill text-dark" href="/notifications">Notifications</a>
                        <a class="navbar-brand bi-people-fill text-dark" href="/friends">Friends</a>
                            <li class="nav-item dropdown ">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle px-5 " href="/profile" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        {{ __('View Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

       


        <main class="py-4 bg-dark">
            @yield('sms')
            @yield('msgcontent')
            @yield('content')
            @yield('uipost')
            @yield('posts')
            @yield('userprofile')
            @yield('allfriends') 
            @yield('msg')
            @yield('chat')      
                      
        
        </main>
    </div>

     <!-- Bootstrap core JS-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>    

        <script>
            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

                myModal.addEventListener('shown.bs.modal', function () {
                myInput.focus()
                    })
        </script>
        <!--Start Socket first try-->
       
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        
        <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>
             <!-- 
             <script>
                $(function(){

                    let ip_address = '127.0.0.1';
                    let socket_port = '3000';
                    let socket =io(ip_address +':'+ socket_port);
                    
               
                let chatInput = $('#chatInput');

                chatInput.keypress(function(e){
                    let message = $(this).html();
                    console.log(message);
                    if(e.which === 13 && !e.shiftKey){
                        socket.emit('sendChatToServer',message);
                        chatInput.html('');
                        return false;
                    }
                });

                socket.on('sendChatToClient',(message)=>{
                    $('.chat-content ul').append('<li>${message}<li>');

                });


                });
            </script> 
            -->
            <!--end Socket first try-->
         {{--   <script>

                        $(function(){

                            let ip_address = '127.0.0.1';
                            let socket_port = '8000';
                            let socket =io(ip_address +':'+ socket_port);
                            
                    
                        let chatInput = $('#input');

                        chatInput.keypress(function(e){
                            let message = $(this).html();
                            console.log(message);
                            if(e.which === 13 && !e.shiftKey){
                                socket.emit('sendFile',message);
                                chatInput.html('');
                                return false;
                            }
                        });
                
               // var socket = io();
          
                var messages = document.getElementById('messages');
                var form = document.getElementById('form');
                var input = document.getElementById('input');
          
                form.addEventListener('submit', function(e) {
                  e.preventDefault();
                  if (input.value) {
                    socket.emit('chat message', input.value);
                    input.value = '';
                  }
                });
          
                socket.on('chat message', function(msg) {
                  var item = document.createElement('li');
                  item.textContent = msg;
                  messages.appendChild(item);
                  window.scrollTo(0, document.body.scrollHeight);
                });
              </script>
            --}}



        {{--    <script src="/socket.io/socket.io.js"></script>
            <script>
              var socket = io();
            
              var form = document.getElementById('form');
              var input = document.getElementById('input');
            
              form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (input.value) {
                  socket.emit('chat message', input.value);
                  input.value = '';
                }
              });
            </script>
            
</body>

<script src"{{asset('js/app.js')}}"></script>
<script>
Echo.channel('home')
    .listen('NewMessage',(e)=>{
        console.log(e.message);
    })
</script>--}}

{{--@stack('scripts')--}}

</html>

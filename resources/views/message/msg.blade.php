@extends('layouts.app')

@section('msg')

         <!--chat-->
        
         <section class="bg-dark  ">
            <div class="container py-5">
  
                <div class="row">
  
                <div class="bg-dark bg-gradient  p-4 p-sm-5">
  
                 <center> <h1 class="display-5 fw-bolder text-white mb-2">MESSAGES</h1> </center>
                 @if(session()->has('follow'))
                 <div class="alert alert-success mb-2">
                     {{ session()->get('follow') }}
                 </div>
             @endif
                    <div class="card">
                    <div class="card-body">

                        <ul class="list-unstyled mb-0 ">

                        @foreach ($sendmsg as $rcv )

                            @if($rcv->messahe_status=="Send")
                        
                                <form method="POST" action="{{ route('message.select',['id'=>$rcv->message_id]) }}">
                            @else
                                <form method="POST" action="{{ route('message.msg') }}">
                            @endif

                        <li class="p-2 border-bottom" style="background-color: #eee;">
                            <a  href="{{ route('message.select',['id'=>$rcv->message_id]) }}" class="d-flex justify-content-between">
                            <div class="d-flex flex-row">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                <div class="pt-1">
                                <p class="fw-bold mb-0">{{$rcv->name}}</p>
                                <p class="small text-muted">{{ substr($rcv->message_chat, 0, 15); }}</p>
                                </div>
                            </div>
                            <div class="pt-1">
                                <p class="small text-muted mb-1">Just now</p>
                                <span class="badge bg-danger float-end">1</span>
                            </div>
                            </a>
                        </li>
                                </form>
                        @endforeach

                        @foreach ($follow as $bb )
                        <form method="POST" action="{{ route('message.msg') }}">
                            @csrf
                            <input class="form-control mb-2" name="message_user_id" type="hidden"  value="{{ Auth::user()->id }}" />
                            <input class="form-control mb-2" name="message_friend_id" type="hidden"  value="{{ $bb->id }}" />
                            <input class="form-control mb-2" name="message_status" type="hidden"  value="Send" />
                            <input class="form-control mb-2" name="message_chat" type="text"  />
                            <button class="btn btn-primary me-md-2 " type="submit">Send</button>


                        <li class="p-2 border-bottom">
                            <a href="#!" class="d-flex justify-content-between">
                            <div class="d-flex flex-row">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                <div class="pt-1">
                                <p class="fw-bold mb-0">{{ $bb->name }}</p>
                                <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                            <div class="pt-1">
                                <p class="small text-muted mb-1">5 mins ago</p>
                            </div>
                            </a>
                        </li>
                    </form>
                    @endforeach
                       

                        </ul>
                    </div>
                </div>

            </div>

            

            </div>

        </div>
        </section>


@endsection
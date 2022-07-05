@extends('layouts.app')

@section('chat')

         <!--chat-->
        
         <section class="bg-dark  ">
            <div class="container py-5">
  
                <div class="row">
  
                <div class="bg-dark bg-gradient  p-4 p-sm-5">
  
                 <center> <h1 class="display-5 fw-bolder text-white mb-2">CHAT</h1> </center>
                 @if(session()->has('follow'))
                 <div class="alert alert-success mb-2">
                     {{ session()->get('follow') }}
                 </div>
             @endif
                    <div class="card ">
                    <div class="card-body ">

                        <ul class="list-unstyled">

                            @foreach ($receiver as $msg )

                            
                            
                                <!-- <input class="form-control mb-2" name="message_chat" type="text"  /> -->
                               <!-- <button class="btn btn-primary me-md-2 " type="submit">Send</button> -->
                            
                            <li class="d-flex justify-content-between mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                <div class="card w-100">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">{{ $msg->name }}</p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> 12 mins ago</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        {{ $msg->message_chat }}
                                    </p>
                                </div>
                                </div>
                            </li>

                            @endforeach

                            @foreach ($sender as $send )

                           <!-- @if($send->message_status=="Send")
                        
                            <form method="POST" action="{{ route('message.select',['id'=>$send->message_id]) }}">
                        @else
                            <form method="POST" action="{{ route('message.msg') }}">
                        @endif
                            -->
                       
                            <li class="d-flex justify-content-between mb-4">
                                <div class="card w-100">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">{{ $send->name }}</p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                    {{$send->message_chat}}
                                    </p>
                                </div>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                            </li>
                            @endforeach
                                @if($sendid=='~\D~')
                                    <form method="POST" action="{{ route('message.msg',['id'=>$sendid]) }}">
                                @else
                                    <form method="POST" action="{{ route('message.msg') }}">
                                @endif

                                @csrf
                                <input class="form-control mb-2" name="message_user_id" type="hidden"  value="{{ Auth::user()->id }}" />
                               
                                <input class="form-control mb-2" name="message_friend_id" type="hidden"  value="{{$sendid}}" />
                               
                                <input class="form-control mb-2" name="message_status" type="hidden"  value="Sent" />
                           
                            <li class="bg-white mb-3">
                                <div class="form-outline">
                                <textarea class="form-control" name="message_chat" id="textAreaExample2" rows="4"></textarea>
                                <label class="form-label" for="textAreaExample2">Message</label>
                                </div>
                            </li>
                            <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
                            </form>
                           
                            </ul>
                    </div>
                </div>

            </div>

            

            </div>

        </div>
        </section>


@endsection
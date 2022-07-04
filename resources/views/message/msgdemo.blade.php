@extends('layouts.app')

@section('chat')

         <!--chat-->
         <section style="background-color: #eee;">
            <div class="container py-5">

                <div class="row">

                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                    <h5 class="font-weight-bold mb-3 text-center text-lg-start">Messages</h5>

                    <div class="card">
                    <div class="card-body ">

                        <ul class="list-unstyled mb-0 ">

                        @foreach ($sendmsg as $rcv )

                        <li class="p-2 border-bottom" style="background-color: #eee;">
                            <a href="#!" class="d-flex justify-content-between">
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

               <div class="col-md-6 col-lg-7 col-xl-8 "> 
                    
                  
 
                    <ul class="list-unstyled">
                    <li class="d-flex justify-content-between mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                        <div class="card">
                        <div class="card-header d-flex justify-content-between p-3">
                            <p class="fw-bold mb-0">Brad Pitt</p>
                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> 12 mins ago</p>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            </p>
                        </div>
                        </div>
                    </li>
                    <li class="d-flex justify-content-between mb-4">
                        <div class="card w-100">
                        <div class="card-header d-flex justify-content-between p-3">
                            <p class="fw-bold mb-0">Lara Croft</p>
                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium.
                            </p>
                        </div>
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                    </li>
                    <li class="d-flex justify-content-between mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                        <div class="card">
                        <div class="card-header d-flex justify-content-between p-3">
                            <p class="fw-bold mb-0">Brad Pitt</p>
                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> 10 mins ago</p>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            </p>
                        </div>
                        </div>
                    </li>
                    <li class="bg-white mb-3">
                        <div class="form-outline">
                        <textarea class="form-control" id="textAreaExample2" rows="4"></textarea>
                        <label class="form-label" for="textAreaExample2">Message</label>
                        </div>
                    </li>
                    <button type="button" class="btn btn-info btn-rounded float-end">Send</button>
                    </ul>
                    

                 </div>

                </div>

            </div>
            </section>


@endsection
@extends('layouts.app')

@section('allfriends')



         <!--chat-->
         <section class="bg-dark  ">
          <div class="container py-5">

              <div class="row">

              <div class="bg-dark bg-gradient  p-4 p-sm-5">

               <center> <h1 class="display-5 fw-bolder text-white mb-2">FRIENDS</h1> </center>
               @if(session()->has('follow'))
               <div class="alert alert-success mb-2">
                   {{ session()->get('follow') }}
               </div>
           @endif
                  <div class="card">
                  <div class="card-body">

                      <ul class="list-unstyled mb-0">
                        @foreach ($following as $item )

                    @if($item->friend_status=="Following")
                        
                          <form method="POST" action="{{ route('friends.unfollow',['id'=>$item->friend_id]) }}">
                    @else
                          <form method="POST" action="{{ route('friends.allfriends') }}">
                    @endif

                      
                            @csrf
                            <input class="form-control mb-2" name="friend_user_id" type="hidden"  value="{{ Auth::user()->id }}" />
                            <input class="form-control mb-2" name="friend_request_id" type="hidden"  value="{{ $item->id }}" />
                            <input class="form-control mb-2" name="friend_status" type="hidden"  value="Following" />

                      <li class="p-2 border-bottom" >
                      
                          <a href="#!" class="d-flex justify-content-between">
                          <div class="d-flex flex-row">
                              <img src="https://i1.sndcdn.com/avatars-F4ypHmyVG2ahq80Y-Fqoh0w-t500x500.jpg" alt="avatar"
                              class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                              <div class="pt-1">
                              <p class="fw-bold mb-0">{{ $item->name }}</p>
                              <p class="small text-muted">{{ $item->role }}</p>
                              </div>
                          </div>
                          <div class="pt-1">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              
                              <button  class="btn btn-primary me-md-2 " type="submit"> {{ $item->friend_status}}</button>
                              
                              <a href="{{ route('message.select',['id'=>$item->friend_request_id]) }}" class="btn btn-primary" type="button">Message</a>
                            </div>
                          </div>
                          </a>
                      </li>
                        </form>
                      @endforeach

                      @foreach ($follow as $bb )
                      <form method="POST" action="{{ route('friends.follow',['name'=>$bb->name]) }}">
                          @csrf
                          <input class="form-control mb-2" name="friend_user_id" type="hidden"  value="{{ Auth::user()->id }}" />
                          <input class="form-control mb-2" name="friend_request_id" type="hidden"  value="{{ $bb->id }}" />
                          <input class="form-control mb-2" name="friend_status" type="hidden"  value="Following" />

                    <li class="p-2 border-bottom" >
                        <a href="#!" class="d-flex justify-content-between">
                        <div class="d-flex flex-row">
                            <img src="https://i1.sndcdn.com/avatars-F4ypHmyVG2ahq80Y-Fqoh0w-t500x500.jpg" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                            <div class="pt-1">
                            <p class="fw-bold mb-0">{{ $bb->name }}</p>
                            <p class="small text-muted">{{ $bb->role }}</p>
                            </div>
                        </div>
                        <div class="pt-1">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                         
                         
                            <button class="btn btn-primary me-md-2 " type="submit">Follow</button>
                          
                            <a href="{{ route('message.select',['id'=>$bb->id]) }}" class="btn btn-primary" type="button">Message</a>
                          </div>
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
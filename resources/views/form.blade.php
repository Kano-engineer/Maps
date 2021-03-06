@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-3">
            <!-- TODO:Use @yield('sidebar') instead of <div class="sidebar">-->
                <div class="sidebar">
                <!-- 2/28 Update:sidebar in card -->
                    <div class="card" style="width:;">
                        @if (Auth::user()->images->isEmpty()) 
                            <a href="/profile"><img style="" src="{{ URL::asset('image/profile.png') }}"  class="card-img-top" alt="..."></a>
                        @else
                            @foreach(Auth::user()->images as $image)
                            <a href="/profile"><img style="" src="{{ asset('storage/' . $image['file_name']) }}" class="card-img-top" alt="..."></a>
                            @endforeach
                        @endif
                            <p></p>
                            <a href="/profile" type="button" class="btn btn-primary"><i class="fas fa-user">{{ Auth::user()->name }}</i></a>
                            <p></p>
                            <a href="/map" type="button" class="btn btn-primary"><i class="fas fa-globe-europe">MAP</i></a>
                            <p></p>
                            <a href="/post" type="button" class="btn btn-primary"><i class="fas fa-comment-dots">TALK</i></a>
                    </div>
                    <p></p>
                </div>
        </div>

        <div class="col-md-9">
            @if ($errors->has('text'))
                <ul>
                @foreach($errors->all() as $error)
                    <font color =red>*{{ $error }}</font>
                @endforeach
                </ul>
            @endif
            <form action="/post" method="POST" class=".form-control:focus" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="card">
                        <h5 class="card-header" style="color:#094067;">
                            <div class="d-flex flex-row">
                                <div class="p-2">
                                    @if (Auth::user()->images->isEmpty()) 
                                        <a href="/profile/{{Auth::user()->user_id}}"><img style="width:40px;height:40px;border-radius: 50%;" src="{{ URL::asset('image/profile.png') }}"  class="card-img-top" alt="..."></a>
                                    @else
                                        @foreach(Auth::user()->images as $image)
                                        <a href="/profile/{{Auth::user()->user_id}}"><img style="width:40px;height:40px;border-radius: 50%;" src="{{ asset('storage/' . $image['file_name']) }}" class="card-img-top" alt="..."></a>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="p-2"> 
                                    <a type="button" class="btn btn-default" style="color:#3da9fc;" href="/profile/{{Auth::user()->user_id}}"><i class="fas fa-user">{{Auth::user()->name}}</i></a><i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="p-2">
                                        <input class="form-control" name="text"  placeholder="Place">
                                </div>
                            </div>
                        </h5>
                            <div class="card-body">
                                <textarea class="form-control" name="body"  placeholder="" rows="5"></textarea>
                            <p class="card-text"></p>
                                <label><i class="fas fa-images"></i>Photos</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                    </div>
                    <br>
                        <button type="submit" class="btn btn-primary" style="width:100%;padding:0px;font-size:30px;border-radius:20px 20px 20px 20px;"><i class="fas fa-edit">Share Your Travel</i></button>            
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection

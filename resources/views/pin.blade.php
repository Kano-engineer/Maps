@extends('layouts.app')

@section('content')
<title>PIN</title>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- TODO:Use @yield('sidebar') instead of <div class="sidebar">-->
                <!-- 3/1 Update:sidebar in card -->
                <div class="card" style="width:;">
                        @if (Auth::user()->images->isEmpty()) 
                            <a href="/profile"><img style="" src="{{ URL::asset('image/4.jpg') }}"  class="card-img-top" alt="..."></a>
                        @else
                            @foreach(Auth::user()->images as $image)
                            <a href="/profile"><img style="" src="{{ asset('storage/' . $image['file_name']) }}" class="card-img-top" alt="..."></a>
                            @endforeach
                        @endif
                        <a href="/profile" class="card-body">
                        <h4><i class="fas fa-user">USER：{{ Auth::user()->name }}</i></h4>
                            @foreach ($comment as $comment)
                               <p class="card-text">{{ $comment ->comment}}</p>
                            @endforeach
                        </a>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="/map"><i class="fas fa-globe-europe">MAPで検索(実装中：クリックOK)</i></a></li>
                            <li class="list-group-item"><a href="/post"><i class="fas fa-comment-dots">共有チャット</i></a></li>
                        </ul>
                </div>
            <p></p>
        </div>

        <div class="col-md-4">

            <h5 class=".font-weight-bold" style="color:#094067;"><i class="fas fa-map-marker-alt">{{optional($pin) -> text}} by </i><a style="color:#3da9fc;" href="/profile/{{$pin->user_id}}"><i class="fas fa-user"></i>{{$pin->user->name}}</a></h5>

            @if($pin->users()->where('user_id', Auth::id())->exists())
                <form action="{{ route('unfavorites', $pin) }}" method="POST">
                    @csrf
                    <input type="submit" value="&#xf164; いいね！ {{ $pin->users()->count() }}" class="fas btn btn-primary">
                </form>
            @else
                <form action="{{ route('favorites', $pin) }}" method="POST">
                    @csrf
                    <input type="submit" value="&#xf164; いいね！ {{ $pin->users()->count() }}" class="fas btn btn-link">
                </form>
            @endif

            @if(Auth::user()->id === $pin->user_id)
                <a type="button" class="btn btn-primary btn-lg active btn-sm" href="/edit/{{$pin->id}}"><i class="fas fa-user-edit">地名/住所を編集(地図を再検索)</i></a>
            @endif

            @if(Auth::user()->id === $pin->user_id)
                <form action="{{ action('PinController@destroy', $pin->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class='btn btn-danger btn-sm' onClick="delete_alert(event);return false;"><i class="fas fa-trash-alt">投稿削除</i></button>
                </form>
            @endif
            <br>
            @if ($errors->has('file'))
                @foreach($errors->all() as $error)
                <font color =red>*{{ $error }}</font>
                @endforeach
            @endif

            @if(Auth::user()->id === $pin->user_id)
                <form action="/store/{{$pin->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="file">
                    <button type="submit"  class='btn btn-primary btn-lg active btn-sm'><i class="fas fa-images">画像アップロード</i></button>
                </form>
            @endif

            @if ($photos->isEmpty()) 
                <img style="width:380px;height:300px;" src="{{ URL::asset('image/noimage.png') }}" />
            @else

            @foreach ($photos as $photo)
                    <img style="width:380px;height:300px;" src="{{ asset('storage/' . $photo['photo']) }}">
                    <br>
                @if(Auth::user()->id === $pin->user_id)
                    <form action="{{ action('PhotoController@destroy', $photo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class='btn btn-danger btn-sm' onClick="delete_alert(event);return false;"><i class="fas fa-trash-alt"></i></button>
                    </form>
                @endif
            @endforeach
            @endif

            <br>

        <!-- Search longitude and latitude by address -->
        <form type="hidden" onsubmit="return false;">
            <input style="display:none;" type="" value="{{optional($pin) -> text}}" id="address">
            <button style="display:none;" type="" value="" id="map_button">検索</button>
        </form>
        <!-- Output longitude -->
        <input style="display:none;" type="text" id="lng" value=""><br>
        <!-- Output latitude -->
        <input style="display:none;" type="text" id="lat" value=""><br>

        </div>

        <br>

        <div class="col-md-4">
            <!-- Show map -->
            <div class="map_box01"><div id="map-canvas" style="width:500px;height:300px;"></div></div>
            <br>

            <div>
                @if ($errors->has('comment'))
                    @foreach($errors->all() as $error)
                    <font color =red>*{{ $error }}</font>
                    @endforeach
                @endif
            </div>
            <div>
                <form action="/comment/{{$pin -> id}}" method="post">
                    {{ csrf_field() }}
                    <input type="search" name="comment" placeholder="コメント">
                    <button type="submit"><i class="fas fa-comment">コメント</i></button>
                </form>
            </div>

            <br>

            <div class="container">
                @foreach ($comments as $comments)
                        <p style="color:#094067;"><a style="color:#3da9fc;" href="/profile/{{$comments->user_id}}"><i class="fas fa-user"></i>{{$comments->user->name}}</a>
                        {{ $comments->comment }}
                        </p>
                    @if(Auth::user()->id === $comments->user_id)
                        <form action="{{ action('PinController@destroyComment', $comments->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class='btn btn-danger btn-sm' onClick="delete_alert(event);return false;"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

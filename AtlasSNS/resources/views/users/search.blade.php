@extends('layouts.login')

@section('content')
<h1>検索</h1>

<form action="{{url('/search')}}" method="GET">
    <p><input type="text" name="word" placeholder="ユーザー名"></p>
    <p><input type="submit" value="検索"></p>
</form>

<p>検索ワード::{{$word}}</p>
                @foreach ($all_users as $user)
                    <div class="">

<img src="{{ '/storage/' . $user['images']}}" class='rounded-circle'/>
</div>
                            <div class="">
                                <p class="">{{ $user->username }}</p>
                            </div>

@if($user->isFollowing()->where('following_id', Auth::id())->exists())

                        <div class="">
                            <form action="{{ route('unfollow', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー解除" class=" btn btn-danger">
                            </form>
                        </div>
                        @else
                                                <div class="">
                            <form action="{{ route('follow', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー" class=" btn btn-success">
                            </form>
                        </div>


                @endif
                @endforeach


@endsection

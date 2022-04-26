@extends('layouts.login')

@section('content')
<h1>検索</h1>

<form action="{{url('/search')}}" method="GET">
    <p><input type="text" name="word" placeholder="ユーザー名"></p>
    <p><input type="submit" value="検索"></p>
</form>

<p>検索ワード::{{$word}}</p>
                @foreach ($all_users as $user)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $user->username }}</p>
                            </div>
<div class="row justify-content-center">
@if($user->isFollowing()->where('following_id', Auth::id())->exists())
                        <div class="col-md-3">
                            <form action="{{ route('unfollow', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー解除" class=" btn btn-danger">
                            </form>
                        </div>
                        @else
                                                <div class="col-md-3">
                            <form action="{{ route('follow', $user) }}" method="POST">
                              @csrf
                                <input type="submit" value="フォロー" class=" btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach


@endsection

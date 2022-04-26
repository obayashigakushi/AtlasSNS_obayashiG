@extends('layouts.login')

@section('content')
                @foreach($posts as $post)

                <table class="table table-hover">

        <tr>
             <td> <a href="{{$post->user_id}}/profile"><img class="image-circle" src="{{ asset('images/' . $post->images ) }}" alt="ユーザーアイコン"></a> </td>

                    <td>{{ $post->username }}</td>
                    <td>{{ $post->post }}</td>
                    <td>{{ $post->created_at }}</td>
               @endforeach
@endsection

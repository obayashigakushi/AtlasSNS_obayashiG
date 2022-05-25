@extends('layouts.login')

@section('content')
<body>
               @foreach($posts->unique('user_id') as $post)
              <td> <a href="{{ route('users.profiles',['user_id'=>$post->user_id])}}"><img src="{{ '/storage/' . $post['images']}}" class='rounded-circle'/></a> </td>
               @endforeach

                @foreach($posts as $post)
                <div>
                <ul>
                <li class="post-block">


             <figure><img class="rounded-circle" src="{{ asset('storage/' . $post->images ) }}" ></figure>
                  <div class="post-content">
                      <div>
                    <div class="post-name">{{ $post->username }}</div>
                    <div>{{ $post->created_at }}</div>

                    </div>
                    <div>{{ $post->post }}</div>
</div>

</li>
</ul>
</div>
</body>
               @endforeach
@endsection

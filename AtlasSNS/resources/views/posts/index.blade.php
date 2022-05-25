@extends('layouts.login')

@section('content')

<body>
                <form action="/create_post" method="post">
            {{ csrf_field() }}
                <div style="">
                    <input type="text" name="post" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="入力">

                    <!-- <input type='hidden' name='id' class="id"> -->

                    <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">投稿</button>

                @if($errors->first('post'))
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('post')}}</p>
                @endif
                </div>
            </form>

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

            @if (Auth::user()->id == $post->user_id)
                <div>



                    <img class="btn js-modal-open" post="{{$post->post}}" post_id="{{$post->id}}" src="{{ asset('images/edit.png') }}" alt="編集" >
                    </button>
</div>


                <div>
                    <a href="/top/{{$post->post}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img class='delete' src="{{ asset('images/trash-h.png') }}" alt="削除" >
                </a>
            </div>
             @endif
</li>
</ul>
</div>
</body>

                @endforeach

    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
    <form action="/top" method='post'>
        <textarea class="post" name='upPost'></textarea>
        <input type='hidden' name='post_id' class="post_id">
        <input type='submit' value='送信'>
        {{csrf_field()}}
    </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div><!--modal__inner-->
    </div><!--modal-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function () {
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var post=$(this).attr('post');
    var post_id=$(this).attr('post_id');

    $('.post').text(post);
    $('.post_id').val(post_id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
</script>


@endsection

@extends('layouts.login')

@section('content')

            <form action="/create_post" method="post">
            {{ csrf_field() }}
                <div style="background-color: #E8F4FA; text-align: center;">
                    <input type="text" name="post" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="入力">

                    <!-- <input type='hidden' name='id' class="id"> -->

                    <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">投稿</button>

                @if($errors->first('post'))
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('post')}}</p>
                @endif
                </div>
            </form>

                @foreach($posts as $post)

                <table class="table table-hover">

        <tr>
             <td> <a href="{{$post->user_id}}/profile"><img class="image-circle" src="{{ asset('storage/' . $post->images ) }}" alt="ユーザーアイコン"></a> </td>

                    <td>{{ $post->username }}</td>
                    <td>{{ $post->post }}</td>
                    <td>{{ $post->created_at }}</td>
            @if (Auth::user()->id == $post->user_id)
                <td>


                   <button type="button" post="{{$post->post}}" post_id="{{$post->id}}" class="btn js-modal-open">
                    <img src="{{ asset('images/edit.png') }}" alt="編集" >
                    </button>
                </td>


                <td>
                    <a class="btn btn-danger" href="/top/{{$post->post}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除
                </a>
            </td>
             @endif
        </tr>
</table>

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

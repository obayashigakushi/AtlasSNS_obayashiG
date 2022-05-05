@extends('layouts.login')

@section('content')

<img src=" {{asset('/public/storage/$user->images') }}">
{!! Form::open(['url' => '/update', 'files' => true]) !!}
    @csrf
    @method('put')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div>
  {{ Form::label('user name') }}
  {{ Form::text('username',$user->username,['class' => 'input']) }}
</div>
<div>
  {{ Form::label('mail adress') }}
  {{ Form::text('mail',$user->mail,['class' => 'input']) }}
</div>
<div>
{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}
</div>
<div>
{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>
<div>
  {{ Form::label('bio') }}
  {{ Form::text('bio',$user->bio,['class' => 'input']) }}
</div>
<div>
  {{ Form::label('icon image') }}
<!-- <form action="/upload" enctype="multipart/form-data" method="post"> -->
    {{ Form::file('images',['class' => 'input']) }}

    <!-- <input type="file" name="imgpath"> -->

</form>
{{ Form::submit('更新') }}
{!! Form::close() !!}


@endsection

<div class='gla'>
<div class='logout'>

@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class='label'>
<P>新規ユーザー登録</P>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('LEGISTER',['input class' => 'btn btn-danger']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>
</div>
</div>

@endsection

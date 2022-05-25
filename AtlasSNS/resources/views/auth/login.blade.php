<div class='gla'>
@extends('layouts.logout')

@section('content')

<div class='logout'>
  {!! Form::open() !!}
<div class='label'>
  <p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN',['input class' => 'btn btn-danger']) }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</div>
</div>
</div>



@endsection

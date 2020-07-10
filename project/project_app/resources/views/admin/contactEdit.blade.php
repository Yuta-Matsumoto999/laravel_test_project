@extends('layouts.admin')

@section('content')

<div class="py-4">
  <div class="container">
    <h1>お問い合わせ詳細</h1>
    <p>{{ $contact->created_at->format('Y/m/d') }} のお問い合わせ</p>
    {!! Form::open(['route' => ['admin.store.comment', $contact->id]]) !!}
      <div class="form-group">
        <h5>TITLE</h5>
        {!! Form::text('title', $contact->title, ['class' => 'form-control', 'readonly']) !!}
      </div>
      <div class="form-group">
        <h5>CONTENT</h5>
        {!! Form::textarea('content', $contact->content, ['class' => 'form-control', 'readonly']) !!}
      </div>
      <div class="form-group @if($errors->has('content')) has-error @endif">
        <h5>Anser</h5>
      {{-- 管理者からの返答が入る --}}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      <div class="form-group text-center">
        {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}
      </div>
    </form>
  </div>

</div>

@endsection
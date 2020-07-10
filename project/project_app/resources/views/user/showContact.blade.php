@extends('layouts.user')

@section('content')
<div class="py-4">
  <div class="container">
    <h1>お問い合わせ詳細</h1>
    <p>{{ $contact->created_at->format('Y/m/d') }} のお問い合わせ</p> 
    {!! Form::open(['route' => ['sale.destroy.contact', $contact->id], 'method' => 'DELETE']) !!}
      <h5>TITLE</h5>
      <div class="form-group">
        {!! Form::text('title', $contact->title, ['class' => 'form-control', 'readonly']) !!}
      </div>
      <h5>CONTENT</h5>
        {!! Form::textarea('content', $contact->content, ['class' => 'form-control', 'readonly']) !!}
      <h5>Anser</h5>
      {{-- 管理者からの返答が入る --}}
      <div class="form-group">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'readonly']) !!}
      </div>
      <div class="form-group text-center">
        {!! Form::submit('削除', ['class' => 'btn btn-primary']) !!}
      </div>
    </form>
  </div>

</div>
@endsection
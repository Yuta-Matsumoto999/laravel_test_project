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
      {{-- 管理者からの返答が入る --}}
      @if ($comments->isNotEmpty())
      @foreach ($comments as $comment)
      <h5>Anser</h5>
      <div class="form-group">
        {!! Form::textarea('comment', $comment->content, ['class' => 'form-control', 'readonly']) !!}
      </div>
      @endforeach
      @else
      <div class="form-group text-center mt-5">
        {!! Form::submit('削除', ['class' => 'btn btn-primary']) !!}
      </div>
      @endif
    </form>
  </div>

</div>
@endsection
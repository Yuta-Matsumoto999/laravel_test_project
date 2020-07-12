@extends('layouts.user')

@section('content')
<main>
  <div class="py-4 vh-100">
    <div class="container">
        <h1>My Contact</h1>
    </div>
    <div class="container">
      @if ($contacts->isNotEmpty())
      <table class="table">
        <thead>
          <tr class="row">
            <th class="col-2 text-center">date</th>
            <th class="col-7 text-center">title</th>
            <th class="col-2 text-center">comment</th>
            <th class="col-1 text-center"></th>
          </tr>
          <tbody>
            @foreach ($contacts as $contact)
            <tr class="row">
              {!! Form::open(['route' =>['sale.show.question', $contact->id], 'method' => 'GET']) !!}
              <td class="col-2 text-center">{{ $contact->created_at->format('Y/m/d') }}</td>
              <td class="col-7 text-center">{{ $contact->title }}</td>
              <td class="col-2 text-center">{{ $contact->comment->count() }}</td>
              <td class="col-1 text-center">{!! Form::submit('詳細', ['class' => 'btn btn-primary']) !!}</td>
              {!! Form::close() !!}
            </tr>
            @endforeach
          </tbody>
        </thead>
      </table>
    </div>
    @else
    <div class="container">
      <div class="text-center mt-5">
        <h3>問い合わせはありません</h3>
      </div>
      <div class="text-center mt-5">
        <img src="{{ asset('logo.image/ogp-1.png') }}" alt="" class="img-fluid">
      </div>
    </div>
    @endif
  </div>
</main>
@endsection
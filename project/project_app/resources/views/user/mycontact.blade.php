@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container mb-4">
        <h1>My Contact</h1>
    </div>
    @if ($contacts->isNotEmpty())
    <div class="container min-vh-100">
      @foreach ($contacts as $contact)
      <div class="container border mb-3">
        {!! Form::open(['route' =>['sale.show.question', $contact->id], 'method' => 'GET']) !!}
          <table class="table table-striped mt-5">
            <tbody>
              <tr>
                <th class="text-center">DATE</th>
                <td class="text-center">{{ $contact->created_at->format('Y/m/d') }}</td>
              </tr>
              <tr>
                <th class="text-center">TITLE</th>
                <td class="text-center">{{ Str::limit($contact->title, 15) }}</td>
              </tr>
              <tr>
                <th class="text-center">COMMENT</th>
                <td class="text-center">{{ $contact->comment->count() }}</td>
              </tr>
            </tbody>
          </table>
          <div class="form-group text-center">
            {!! Form::submit('詳細', ['class' => 'btn btn-primary']) !!}
          </div>
        {!! Form::close() !!} 
      </div>
      @endforeach
    </div>
    @else
    <div class="container vh-100">
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
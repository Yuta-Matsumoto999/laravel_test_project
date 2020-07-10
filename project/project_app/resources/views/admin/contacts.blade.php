@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="row mt-5 ml-5">
    <h3>お問い合わせ管理</h3>
  </div>
  <table class="table mt-5">
    <thead>
      <tr class="row">
        <th class="col-2 text-center">date</th>
        <th class="col-4 text-center">user</th>
        <th class="col-2 text-center">title</th>
        <th class="col-2 text-center">comment</th>
        <th class="col-1 text-center"></th>
        <th class="col-1 text-center"></th>
      </tr>
      <tbody>
        @foreach ($contacts as $contact)
        <tr class="row">
          {!! Form::open(['route' =>['admin.destroy.contact', $contact->id], 'method' => 'DELETE', 'class' => 'd-inline']) !!}
          <td class="col-2 text-center">{{ $contact->created_at->format('Y/m/d') }}</td>
          <td class="col-4 text-center">{{ $contact->user->name }}</td>
          <td class="col-2 text-center">{{ $contact->title }}</td>
          <td class="col-2 text-center"></td>
          <td class="col-1 text-center"> {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}</td>
          {!! Form::close() !!}
          <td class="col-1 text-center"><a class="btn btn-info" href="{{ route('admin.editComment', $contact->id) }}">詳細</a></td>
        </tr>
        @endforeach
      </tbody>
    </thead>
  </table>
  {{ $contacts->links() }}
</div>

@endsection
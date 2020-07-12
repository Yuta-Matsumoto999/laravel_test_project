@extends('layouts.admin')

@section('content')

<div class="py-4">
  <div class="container mb-4"> 
    <h3>お問い合わせ管理</h3>
  </div>
  @foreach ($contacts as $contact)
  <div class="container border mb-5">
    <h3 class="mt-3">{{ $contact->user->name }}   様</h3>
    <div class="row">
      <table class="table table-striped">
        <tbody>
          <tr>
            <th class="text-center">DATE</th>
            <td class="text-center"> {{ $contact->created_at->format('Y/m/d')}}</td>
          </tr>
          <tr>
            <th class="text-center">TITLE</th>
            <td class="text-center">{{ $contact->title }}</td>
          </tr>
          <tr>
            <th class="text-center">Comment</th>
            <td class="text-center">{{ $contact->comment->count() }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="form-group col-6 text-right">
        {!! Form::open(['route' => ['admin.destroy.contact', $contact->id], 'method' => 'DELETE']) !!}
          {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
      <div class="col-6 text-left">
        <a href="{{ route('admin.editComment', $contact->id) }}"><button class="btn btn-info">詳細</button></a>
      </div>
    </div>
  </div>
  @endforeach
  {{ $contacts->links() }}
</div>

@endsection
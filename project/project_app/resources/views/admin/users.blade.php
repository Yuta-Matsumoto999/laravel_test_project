@extends('layouts.admin')

@section('content')
<div class=py-4>
  <div class="container">
    <div class="container">
      <h3>クライアント管理</h3>
    </div>
    <div class="container mt-4">
      {!! Form::open(['route' => ['admin.users'], 'method' => 'GET']) !!}
      <div class="form-row">
        <div class="form-group col-8">
          {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-2 ml-3">
          {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
    <table class="table mt-4">
      <thead>
        <tr class="row">
          <th class="col-2 text-center">name</th>
          <th class="col-4 text-center">email</th>
          <th class="col-2 text-center">address_num</th>
          <th class="col-3 text-center">address</th>
          <th class="col-1 text-center"></th>
        </tr>
        <tbody>
          @foreach ($users as $user)
          <tr class="row">
            {!! Form::open(['route' =>['admin.confirm.user', $user->id], 'method' => 'GET']) !!}
            <td class="col-2 text-center">{{ $user->name }}</td>
            <td class="col-4 text-center">{{ $user->email }}</td>
            <td class="col-2 text-center">{{ $user->address_num }}</td>
            <td class="col-3 text-center">{{ $user->address }}</td>
            <td class="col-1 text-center">{!! Form::submit('詳細', ['class' => 'btn btn-info']) !!}</td>
            {!! Form::close() !!}
          </tr>
          @endforeach
        </tbody>
      </thead>
    </table>
    {{ $users->links() }}
  </div>
</div>
@endsection
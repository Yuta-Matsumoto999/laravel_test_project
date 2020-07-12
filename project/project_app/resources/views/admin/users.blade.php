@extends('layouts.admin')

@section('content')
<div class=py-4>
  <div class="container">
    <h3>クライアント管理</h3>
  </div>
  <div class="container mt-4">
    {!! Form::open(['route' => ['admin.users'], 'method' => 'GET']) !!}
    <div class="form-row">
      <div class="form-group col-4">
        <label>Name</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-4">
        <label>Email</label>
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
      </div>
      <div class="from-group col-4">
        <label>Birthday</label>
        {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
      </div>
    </div>
    <div class="form-group text-center">
      {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
  </div>
  @foreach ($users as $user)
  <div class="container border mb-5">
    <h3 class="mt-3">{{ $user->name }}   様</h3>
    <div class="row">
      <table class="table table-striped">
        <tbody>
          <tr>
            <th class="text-center">email</th>
            <td class="text-center"> {{ $user->email}}</td>
          </tr>
          <tr>
            <th class="text-center">生年月日</th>
            <td class="text-center">{{ $user->birthday }}</td>
          </tr>
          <tr>
            <th class="text-center">性別</th>
            <td class="text-center">@if($user->gender === 1) 男性 @elseif($user->gender === 2) 女性 @elseif($user->gender === 3) 指定しない @endif</td>
          </tr>
          <tr>
            <th class="text-center">郵便番号</th>
            <td class="text-center">{{ $user->address_num }}</td>
          </tr>
          <tr>
            <th class="text-center">住所</th>
            <td class="text-center">{{ $user->address }}</td>
          </tr>
          <tr>
            <th class="text-center">登録日</th>
            <td class="text-center">{{ $user->created_at->format('Y/m/d') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="form-group text-right">
      <a href="{{ route('admin.confirm.user', $user->id) }}"><button class="btn btn-info">詳細</button></a>
    </div>
  </div>
  @endforeach
  {{ $users->links() }}
</div>
@endsection
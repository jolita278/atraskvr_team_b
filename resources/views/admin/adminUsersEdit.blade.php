@extends('admin.adminBase')

@section('adminUsersEdit')
    <div class="container">
        <h2>Koreguoti vartotojo informaciją</h2>

        {!!Form::open(['url' => route($usersEdit, $item['id'])]) !!}
        <br>
        {{Form::label('user_name', 'Prisijungimo vardas')}}<br>
        {{Form::text('user_name',$item['user_name'])}}
        <br>
        {{Form::label('first_name', 'Vardas')}}<br>
        {{Form::text('first_name', $item['first_name'])}}
        <br>
        {{Form::label('last_name', 'Pavardė')}}<br>
        {{Form::text('last_name',$item['last_name'])}}
        <br>
        {{Form::label('email', 'El.paštas')}}<br>
        {{Form::text('email',$item['email'])}}
        <br>
        {{Form::label('phone', 'Telefono numeris')}}<br>
        {{Form::text('phone',$item['phone'])}}
        <br>
        <br>
        {{Form::submit('Patvirtinti') }} {{--TODO:: button reset--}}
        <a href="{{route($usersList)}}" class="btn">Grįžti</a>
        {!!Form::close() !!}

    </div>
    <div>@include('error-notification')</div>

@endsection
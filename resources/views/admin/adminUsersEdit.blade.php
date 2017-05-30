@extends('admin.adminBase')

@section('adminUsersEdit')
    <div class="container">
        <h2>Koreguoti vartotojo informaciją</h2>

        <div>@include('error-notification')</div>

        {!!Form::open(['url' => route($edit, $item['id'])]) !!}
        <br>
        {{Form::label('user_name', 'Vardas')}}<br>
        {{Form::text('user_name',$item['user_name'])}}

        <br>
        {{Form::label('last_name', 'Pavardė')}}<br>
        {{Form::text('last_name',$item['last_name'])}}
        <br>
        {{Form::label('email', 'Prisijungimo el.paštas')}}<br>
        {{Form::text('email',$item['email'])}}
        <br>
        {{Form::label('phone', 'Telefono numeris')}}<br>
        {{Form::text('phone',$item['phone'])}}
        <br>
        <br>
        {{Form::submit('Patvirtinti') }} {{--TODO:: button reset--}}
        <a href="{{route($list)}}" class="btn">Grįžti</a>
        {!!Form::close() !!}

    </div>


@endsection
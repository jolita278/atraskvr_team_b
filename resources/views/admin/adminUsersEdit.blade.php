@extends('admin.adminBase')

@section('adminUsersEdit')
    @if(isset($success_message))

        @foreach($success_message as $message)
            <div style="background:green; color:white"> {{$message}}!</div>
        @endforeach
    @endif

    @if(isset($error))

        @foreach($error as $err)
            <div style="background:red; color:white"> {{$err}}!</div>
        @endforeach

    @endif
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

        {!!Form::close() !!}
        <br>
        @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
    </div>
@endsection
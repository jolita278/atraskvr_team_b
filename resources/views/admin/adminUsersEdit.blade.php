@extends('admin.adminBase')

@section('adminUsersEdit')
    <div class="container">
        <h2>Edit user's data</h2>

        <div>@include('error-notification')</div>

        {!!Form::open(['url' => route($edit, $item['id'])]) !!}
        <br>
        {{Form::label('user_name', 'First name')}}<br>
        {{Form::text('user_name',$item['user_name'])}}

        <br>
        {{Form::label('last_name', 'Last name')}}<br>
        {{Form::text('last_name',$item['last_name'])}}
        <br>
        {{Form::label('email', 'Email')}}<br>
        {{Form::text('email',$item['email'])}}
        <br>
        {{Form::label('phone', 'Phone')}}<br>
        {{Form::text('phone',$item['phone'])}}
        <br>
        <br>
        {{Form::submit('Submit') }} {{--TODO:: button reset--}}
        <a href="{{route($list)}}" class="btn">Back</a>
        {!!Form::close() !!}

    </div>


@endsection
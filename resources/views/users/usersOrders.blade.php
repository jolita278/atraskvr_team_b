@extends('users.usersBase')

@section('usersOrders')
    <div class="container">
        <h2>Create reservation</h2>
        <div>@include('error-notification')</div>

        {!! Form::open(['url' => route('app.admin.orders.create')]) !!}
        <h4><b>Please choose the date</b></h4><br>
        <br>
        <div class="row">
            <div class="col-lg-12">
            {{ Form::label('experience_id','Please choose experience') }}<br>
            {{ Form::select('experience_id', $experiences, null) }} <br>

        </div>

        <div class="row">
        </div>
        <div class="row">
            <br>
            <div class="col-lg-8">
                {{--{{dd($time)}}--}}
                @foreach($times as $key => $value)
                    <br/>
                @endforeach
            </div>


        </div>


        <br>

        {{ Form::submit('Submit') }}
        {!! Form::close() !!}


    </div>
@endsection


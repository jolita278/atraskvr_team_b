@extends('admin.adminBase')

@section('adminMenusCreate')

    <div class="container">
        <h2>Sukurti naują įrašą</h2>

        {!! Form::open(['url' => route($routeNew), 'files' => true]) !!}
        <br>
        {{ Form::label('name', 'Pavadinimas')}}<br>
        {{Form::text('name')}}

        <br>
        {{ Form::label('calories', 'Kalorijos')}}<br>
        {{Form::text('calories')}}
        <br>
        {!! Form::label('Nuotrauka') !!}
        {!! Form::file('image', null) !!}

        <br>

        {{ Form::submit('Patvirtinti') }} {{--TODO:: button reset--}}

        {!! Form::close() !!}
    </div>
@endsection
@extends('admin.adminBase')

@section('adminUpload')

    @include('error-notification')
    <div class="container">
        <h2>Įkelti nuotrauką</h2></br>

        {!! Form::open(
            array(
                'route' => 'app.admin.resources.store',
                'class' => 'form',
                'novalidate' => 'novalidate',
                'files' => true))
       !!}
        <div class="form-group">
            {!! Form::file('image', null) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Įkelti') !!}

        </div>

        {!! Form::close() !!}

    </div>

@stop
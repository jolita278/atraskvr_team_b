@extends('admin.adminBase')

@section('adminMenusCreate')
    <div class="container">

        <h2>Create new menu</h2>
        <div>@include('error-notification')</div>

        {!! Form::open(['url' => route('app.admin.menus.create')]) !!}
        <br>
        {{ Form::label('language', 'Choose language')}}<br>
        {{Form::select('language', $languages)}}
        <br>
        {{ Form::label('title', 'Choose title')}}<br>
        {{Form::select('title', $pages)}}
        <br>
        {{ Form::label('parent', 'Parent')}}<br>
        {{Form::select('parent', [ null => 'Choose parent'] + $parent)}}
        <br> 
        {{ Form::label('sequence', 'Sequence')}}<br>
        {{Form::text('sequence')}}
        <br>
        {{ Form::label('slug', 'Slug')}}<br>
        {{Form::text('slug')}}
        <br> 
        {{ Form::label('new_windows', 'Open in new window?')}}<br>
        {{ Form::radio('new_window', '1') }}Yes
        {{ Form::radio('new_window', '0', true) }}No
        <br>

        {{ Form::submit('Submit') }} {{--TODO:: button reset--}}
        {!! Form::close() !!}
    </div>
@endsection
@extends('admin.adminBase')

@section('adminMenusCreate')
    <div class="container">
        <h2>Create new menu</h2>

        {!! Form::open(['url' => route('app.admin.menus.create')]) !!}
        <br>
        {{ Form::label('sequence', 'Sequence')}}<br>
        {{Form::text('sequence')}}
        <br>
        {{ Form::label('parent', 'Parent')}}<br>
        {{Form::text('parent')}}
        <br>
        {{ Form::label('title', 'Title')}}<br>
        {{Form::select('title', $pages)}}
        <br>
        {{ Form::label('slug', 'Slug')}}<br>
        {{Form::text('slug')}}
        <br>
        {{ Form::label('language', 'Language')}}<br>
        {{Form::select('language', $languages)}}
        <br>
        <br>

        {{ Form::submit('Submit') }} {{--TODO:: button reset--}}

        {!! Form::close() !!}
    </div>
@endsection
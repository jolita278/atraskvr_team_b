@extends('admin.adminBase')

@section('adminMenusCreate')
    <div class="container">

        <h2>Edit menu</h2>
        <div>@include('error-notification')</div>
        {!! Form::open(['url' => route($edit, [$item['id'], $languageCode])]) !!}
        <br>
        {{ Form::label('language', 'Choose language')}}<br>
        {{Form::select('language', $languages)}}
        <br>
        {{ Form::label('title', 'Choose title')}}<br>
        {{Form::select('title', $pages, $translationItem[0]['name'])}}
        <br>
        {{ Form::label('parent', 'Parent')}}<br>
        {{Form::text('parent', $item['parent'])}}
        <br>
        {{ Form::label('slug', 'Slug')}}<br>
        {{Form::text('slug', $translationItem[0]['slug'])}}
        <br>
        {{ Form::label('sequence', 'Sequence')}}<br>
        {{Form::text('sequence', $item['sequence'])}}
        <br>
        {{ Form::label('new_windows', 'Open in new window?')}}<br>
        @if($item['new_window'] == 1)
            {{ Form::radio('new_window', '1', true) }}Yes
            {{ Form::radio('new_window', '0') }}No
            @else
            {{ Form::radio('new_window', '1') }}Yes
            {{ Form::radio('new_window', '0', true) }}No
        @endif
        <br>
        <br>
        {{ Form::submit('Submit') }} {{--TODO:: button reset--}}
        {!! Form::close() !!}
    </div>
@endsection        
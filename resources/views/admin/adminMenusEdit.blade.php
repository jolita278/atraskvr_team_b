@extends('admin.adminBase')

@section('adminMenusCreate')
    <div class="container">

        <h2>Edit menu</h2>
        <div>@include('error-notification')</div>
        {!! Form::open(['url' => route($edit, ['id' => $item['id'], 'lang' => $languageCode])]) !!}
        <br>
        {{ Form::label('language_id', 'Choose language')}}<br>
        {{Form::select('language_id', $languages, $languageCode)}}
        <br>
        {{ Form::label('name', 'Choose Name')}}<br>
        {{Form::select('name', $pages, $item['translations_data']['name'])}}
        <br>
        {{ Form::label('parent', 'Parent')}}<br>
        {{Form::select('parent', [ null => 'Choose parent'] + $parent, $item['parent'])}}
        <br>
        {{ Form::label('slug', 'Slug')}}<br>
        {{Form::text('slug', $item['translations_data']['slug'])}}
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
@extends('admin.adminBase')

@section('adminMenusCreate')
    <div class="container">
        <h2>Atnaujinti meniu įrašą</h2>
        <div>@include('error-notification')</div>
        {!! Form::open(['url' => route($edit, [$item['id'], $languageCode])]) !!}
        <br>
        {{ Form::label('language', 'Pasirinkti kalbą')}}<br>
        {{Form::select('language', $languages)}}
        <br>
        {{ Form::label('title', 'Pasirinkti pavadinimą')}}<br>
        {{Form::select('title', $pages, $translationItem[0]['name'])}}
        <br>
        {{ Form::label('parent', 'Tėvinis meniu')}}<br>
        {{Form::text('parent', $item['parent'])}}
        <br>
        {{ Form::label('slug', 'Nuoroda')}}<br>
        {{Form::text('slug', $translationItem[0]['slug'])}}
        <br>
        {{ Form::label('sequence', 'Eiliškumas')}}<br>
        {{Form::text('sequence', $item['sequence'])}}
        <br>
        {{ Form::label('new_windows', 'Ar atidaryti naujam lange?')}}<br>
        @if($item['new_window'] == 1)
            {{ Form::radio('new_window', '1', true) }}Taip
            {{ Form::radio('new_window', '0') }}Ne
            @else
            {{ Form::radio('new_window', '1') }}Taip
            {{ Form::radio('new_window', '0', true) }}Ne
        @endif
        <br>
        <br>
        {{ Form::submit('Patvirtinti') }} {{--TODO:: button reset--}}

        {!! Form::close() !!}
    </div>
@endsection
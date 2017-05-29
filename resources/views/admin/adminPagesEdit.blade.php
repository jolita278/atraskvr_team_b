@extends('admin.adminBase')

@section('adminPagesEdit')

    <div class="container">
        <h2>Kurti naują puslapį</h2>

        {!!Form::open(['url' => route('app.admin.pages.create')]) !!}
        {{Form::label('page', 'Puslapio kategorija:')}}
        {{Form::select('category_id', $category, $single['category_id'])}}
        <br/>
        {{Form::label('page', 'Resursai:')}}
        {{Form::select('resource_id' , $resource, $single['resource_id'])}}
        <br/>
        {{Form::label('page', 'Kalbos:')}}
        {{Form::select('language_id',$language, $single['translations_data']['language_id'])}}
        <br/>
        {{Form::label('page', 'Pavadinimas:')}}
        <br/>
        {{Form::textarea('title',null,['size' => '40x1'])}}
        <br/>
        {{Form::label('page', 'Aprasymas trumpas:')}}
        <br/>
        {{Form::textarea('description_short',$single['translations_data']['description_short'], ['size' => '40x3']) }}
        <br/>
        {{Form::label('page', 'Aprasymas ilgas:')}}
        <br/>
        {{Form::textarea('description_long',null, ['size' => '40x8']) }}
        <br/>
        {{Form::label('page', 'SLUG:')}}
        <br/>
        {{Form::textarea('slug',null, ['size' => '40x1'] )}}
        <br/>
        {{Form::submit('Patvirtinti') }}
        {!! Form::close() !!}

    </div>
@endsection
@extends('admin.adminBase')

@section('adminPagesCreate')

    <div class="container">
        <h2>Kurti naują puslapį</h2>

        {!!Form::open(['url' => route('app.admin.pages.create')]) !!}
        {{Form::label('page', 'Puslapio kategorija:')}}
        {{Form::select('category_id', $category)}}
        <br/>
        {{Form::label('page', 'Resursai:')}}
        {{Form::select('resource_id' , $resource)}}
        <br/>
        {{Form::label('page', 'Kalbos:')}}
        {{Form::select('language_id',$language)}}
        <br/>
        {{Form::label('page', 'Pavadinimas:')}}
        <br/>
        {{Form::textarea('title',null,['size' => '40x1'])}}
        <br/>
        {{Form::label('page', 'Aprasymas trumpas:')}}
        <br/>
        {{Form::textarea('description_short',null, ['size' => '40x3']) }}
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


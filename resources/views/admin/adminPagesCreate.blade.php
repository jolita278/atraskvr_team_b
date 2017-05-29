@extends('admin.adminBase')

@section('adminPagesEdit')

    <div class="container">
        <h2>Kurti naują puslapį</h2>

        {!!Form::open(['url' => route('app.admin.pages.create')]) !!}
        {{Form::label('page', 'Puslapio kategorija:')}}
        <br>
        {{Form::select('category_id', $category)}}
        <br/>
        {{Form::label('page', 'Resursai:')}}
        <br>
        {{Form::select('resource_id' , $resource)}}
        <br>
        {{Form::label('page', 'Kalbos:')}}
        <br>
        {{Form::select('language_id',$language)}}
        <br/>
        {{Form::label('page', 'Pavadinimas:')}}
        <br>
        {{Form::text('title')}}
        <br/>
        {{Form::label('page', 'Aprasymas trumpas:')}}
        <br>
        {{Form::textarea('description_short',null, ['size' => '30x4']) }}
        <br/>
        {{Form::label('page', 'Aprasymas ilgas:')}}
        <br>
        {{Form::textarea('description_long',null, ['size' => '50x8'])}}
        <br/>
        {{Form::label('page', 'SLUG:')}}
        <br>
        {{Form::text('slug')}}
        <br/>
        {{Form::submit('Patvirtinti') }}
        {!! Form::close() !!}


    </div>
@endsection


@extends('admin.adminBase')

@section('adminPagesEdit')

    <div class="container">
        <h2>Kurti naują puslapį</h2>

       {!!Form::open(['url' => route('app.admin.pages.create')]) !!}
        {{Form::label('page', 'Puslapio kategorija:')}}
        {{Form::select('category_id', $category)}}
        <br/>
        {{Form::label('page', 'Resursai:')}}
        {{Form::select('resource_id' , $resource)}}
        <hr/>
        {{Form::label('page', 'Kalbos:')}}
        {{Form::select('language_id',$language)}}
        <br/>
        {{Form::label('page', 'Pavadinimas:')}}
        {{Form::text('title')}}
        <br/>
        {{Form::label('page', 'Aprasymas trumpas:')}}
        {{Form::textarea('description_short',null, ['size' => '30x4']) }}
        <br/>
        {{Form::label('page', 'Aprasymas ilgas:')}}
        {{Form::textarea('description_long',null, ['size' => '50x8'])}}
        <br/>
        {{Form::label('page', 'SLUG:')}}
        {{Form::text('slug')}}
        <br/>
        {{Form::submit('Patvirtinti') }}
        {!! Form::close() !!}


    </div>
@endsection


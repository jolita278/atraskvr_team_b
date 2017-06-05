@extends('admin.adminBase')

@section('adminPagesEdit')

    <div class="container">
        <h2>Redaguoti puslapį</h2>

        {!!Form::open(['url' => route('app.admin.pages.edit', [$sing['id'],$languageCode])]) !!}
              {{Form::label('page', 'Puslapio kategorija:')}}
        {{Form::select('category_id', $category, $single['category_id'])}}
        <br/>
        {{Form::label('page', 'Resursai:')}}
        {{Form::select('resource_id' , $resource, $single['resource_id'])}}
        <br/>

        {{Form::label('page', 'Kalbos:')}}
        {{Form::select('language_id', $language, $single['translations_data']['language_id'])}}
         <br/>
        {{Form::label('page', 'Pavadinimas:')}}
        <br/>
        {{Form::textarea('title',$single['translations_data']['title'],['size' => '40x1'])}}
        <br/>
        {{Form::label('page', 'Aprasymas trumpas:')}}
        <br/>
        {{Form::textarea('description_short',$single['translations_data']['description_short'], ['size' => '40x3']) }}
        <br/>
        {{Form::label('page', 'Aprasymas ilgas:')}}
        <br/>
        {{Form::textarea('description_long',$single['translations_data']['description_long'], ['size' => '40x8']) }}
        <br/>
        {{Form::label('page', 'SLUG:')}}
        <br/>
        {{Form::textarea('slug',$single['translations_data']['slug'], ['size' => '40x1'] )}}
        <br/>
        {{Form::submit('Atnaujinti') }}
        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
<script>

    var $languageDropDown = $("[name='language_id']");

    $languageDropDown.bind('change', function () {
        location.href = "/admin/pages/{{$single['id']}}/edit/" + $languageDropDown.val();
    });
</script>
@endsection


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
        {{ Form::label('name', 'Name')}}<br>
        {{Form::text('name', $item['translations_data']['name'])}}
        <br>
        {{ Form::label('parent', 'Parent (if you want to make a dropdown)')}}<br>
        {{Form::text('parent', $item['parent'])}}
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

@section('scripts')
    <script>
        var $languageDropDown = $("[name='language_id']");
        $languageDropDown.bind('change', function () {
            location.href = "/admin/menus/{{$item['id']}}/edit/" + $languageDropDown.val();
        });
    </script>
@endsection
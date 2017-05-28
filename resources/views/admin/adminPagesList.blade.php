@extends('admin.adminBase')

@section('adminPagesList')
    <div class="container">
        <h2>Puslapių sąrašas</h2>

        <div class="row">

            <div class="col-md-12 text-center">
                <a href="{{ url('/admin/pages/create/') }}" class="btn btn-primary" role="button">
                    Pridėti naują</a>
                <hr/>

                @include('error-notification')
            </div>
            <tr>
                @foreach($list as $key -> $array)
                    @if($key == 'translations_data')
                        @foreach($array as $key -> $record)
                            @elseif($key == 'language_data')
                                {{$language_data['name']}}
                            @else
                                <td> {{$record}}</td>
                                @endforeach
                    @endif

                            <td> {{$array}}</td>
            @endforeach



        </div>
    </div>
@endsection

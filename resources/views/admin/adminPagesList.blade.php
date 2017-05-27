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
            @foreach($list as $key => $array)
                <tr>
                    @foreach ($array['translations_data'] as $key => $record)

                        @foreach ($record as $key => $value)
                            <td> {{$value}}</td>

                        @endforeach

                        {{--
                                                       <td><a href="{{route($routeShowDelete, $value['id'])}}"
                                                              class="btn btn-primary btn-sm">Peržiūrėti</a>
                                                       </td>

                                                       <td><a href="{{route($routeEdit, $value['id'])}}" class="btn btn-info btn-sm">Koreguoti</a>
                                                       </td>

                                                       <td><a onclick="deleteItem('{{route($routeShowDelete, $value['id'])}}')"
                                                              class="btn btn-info btn-sm">Ištrinti</a>
                                                       </td>--}}
                </tr>
            @endforeach
            @endforeach

        </div>
@endsection



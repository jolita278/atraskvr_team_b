@extends('admin.adminBase')

@section('adminPagesList')
    <div class="container">
        <h2>Puslapių sąrašas</h2>

        <table class="table table-hover">
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

        </table>
    </div>
@endsection



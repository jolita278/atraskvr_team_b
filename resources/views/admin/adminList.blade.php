@extends('admin.adminBase')

@section('adminList')
    <div class="container">
        <h2> {{$listName}} sąrašas</h2>
        <table class="table table-hover">
            @if(isset($url))
            <a href="{{$url}}" class="btn btn-primary" role="button">
                Pridėti naują</a>
            <hr/>
            @endif
            <thead>
            <tr>

                @foreach($list [0] as $key => $value)

                    <th>{{$key}}</th>

                @endforeach

            </tr>

            </thead>
            <tbody>
            @foreach ($list as $key => $record)
                <tr>
                    @foreach ($record as $key => $value)
                        @if ($key == $ignore)

                        @else

                            <td>
                                {{$value}}
                            </td>
                        @endif
                    @endforeach

                    @if(isset($showDelete))

                        <td><a href="{{route($showDelete, $record['id'])}}"
                               class="btn btn-primary btn-sm">Peržiūrėti</a>
                        </td>
                    @endif

                    @if(isset($edit))

                        <td><a href="{{route($edit, $record['id'])}}" class="btn btn-info btn-sm">Koreguoti</a>
                        </td>
                    @endif
                    @if(isset($showDelete))
                        <td><a onclick="deleteItem('{{route($showDelete, $record['id'])}}')"
                               class="btn btn-info btn-sm">Ištrinti</a>
                        </td>
                    @endif
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@endsection


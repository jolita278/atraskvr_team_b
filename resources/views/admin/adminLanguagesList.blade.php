@extends('admin.adminBase')

@section('adminLanguagesList')
    <div class="container">
        <h2>Kalbų sąrašas</h2>
        <table class="table table-hover">
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
                        <td>
                            {{$value}}
                        </td>

                    @endforeach

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@endsection
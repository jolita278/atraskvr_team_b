@extends('admin.adminBase')

@section('adminCategoriesList')
    <div class="container">
        <h2>Kategorijų sąrašas</h2>
        <table class="table table-hover">
            <thead>
            <tr>

                @foreach($list [0] as $key => $value)

                    <td>{{$key}}</td>
                @endforeach

            </tr>

            </thead>
            <tbody>

            @foreach ($list as $record)
                <tr>
                @foreach($record as $key => $value)
{{dd($record)}}
                    @if($key == 'category_translations')


                        <td>{{$value}}</td>
                    @else
                        <td>{{$value}}</td>
                        @endif
                @endforeach
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
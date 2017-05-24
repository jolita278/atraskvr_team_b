@extends('admin.adminBase')

@section('usersSingle')
    <div class="container">
        <h2>Įrašo duomenys</h2>

        <table class="table table-hover">
            <thead>
            <br>
            </thead>
            <tbody>

            @foreach($single as $key => $value)
                <tr>
                    <td class="col-md-2">{{$key}} </td>
                    <td> {{$value}}</td>
                    @endforeach
                </tr>
                <a href="{{route($usersEdit, $single['id'])}}" class="btn btn-primary btn-sm">Koreguoti</a>

                <a onclick="deleteItem('{{route($usersShowDelete, $single['id'])}}')"
                   class="btn btn-info btn-sm">Ištrinti</a>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteItem(route) {
            $.ajax({
                url: route,
                dataType: 'json',
                type: 'DELETE',
                success: function () {
                    alert('DELETED');
                },
                error: function () {
                    alert('ERROR');
                }
            });
        }

    </script>
@endsection
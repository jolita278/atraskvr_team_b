@extends('admin.adminBase')

@section('adminUsersList')
    <div class="container">
        <h2>Prisiregistravusių vartotojų sąrašas</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nr</th>
                <th>ID</th>
                <th>Sukurtas</th>
                <th>Pakeistas</th>
                <th>Ištrintas</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>El.paštas</th>
                <th>Telefono numeris</th>
                <th>Rolė</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($list as $key => $record)
                <tr>
                    @foreach ($record as $key => $value)
                        @if($key == 'roles_connection_data')
                                @foreach($record['roles_connection_data'] as $role)
                                    <td>{{$role['name']}}</td>
                                @endforeach
                        @else
                            <td>{{$value}}</td>
                        @endif

                    @endforeach

                    <td><a href="{{route($usersShowDelete, $record['id'])}}"
                           class="btn btn-primary btn-sm">Peržiūrėti</a>
                    </td>

                    <td><a href="{{route($usersEdit, $record['id'])}}" class="btn btn-info btn-sm">Koreguoti</a>
                    </td>
                    <td><a onclick="deleteItem('{{route($usersShowDelete, $record['id'])}}')"
                           class="btn btn-info btn-sm">Ištrinti</a>
                    </td>

                </tr>

            @endforeach

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
@extends('admin.adminBase')

@section('adminSingle')
    <div class="container">
        <h2>{{$title}}</h2>
        <div>@include('error-notification')</div>

        <table class="table table-hover">
            <thead>
            <br>
            </thead>
            <tbody>

            @foreach($single as $key => $value)

                @if(!is_array($value))
                    <tr>
                        <td>{{$key}} </td>
                        <td>{{$value}}</td>
                    </tr>
                @elseif($key == 'cover_images')
                    <td>{{$key}}</td>
                    <td><img src="{{asset($value['path'])}}" class="img-rounded" width="200"></td>

                @elseif ($key == 'translations')
                    @foreach ($value as $key => $translations)

                        @foreach ($translations['pivot'] as $key => $translation)
                            <tr>
                            <td>{{$key}}</td>
                                <td>{{$translation}} </td>
                            </tr>
                        @endforeach
                    @endforeach

                @endif
            @endforeach

            <a href="{{route($edit, [$single['id'], app()->getLocale()])}}" class="btn btn-primary btn-sm">Edit</a>

            <a onclick="deleteItem('{{route($showDelete, $single['id'])}}')"
               class="btn btn-info btn-sm">Delete</a>

            <a href="{{route($list)}}" class="btn btn-primary btn-sm">Back</a>
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
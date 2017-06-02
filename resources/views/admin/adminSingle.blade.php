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
                <tr>
                    {{--{{dd($single)}}--}}
                    <td class="col-md-2">{{$key}} </td>

                    @if(is_array($value)&& $key == 'menus_translations_data')
                        <td>
                            {{--{{dd($value)}}--}}
                            @foreach ($value as $translation_value)
                                {{--{{dd($translation_value)}}--}}
                                {{--@foreach ($translation_value as $key => $translation)--}}
                                    {{--{{dd($translation)}}--}}
                                    {{--<li>--}}
                                        {{--{{$translation}}--}}
                                    {{--</li>--}}

                                {{--@endforeach--}}
                            @endforeach
                        </td>

                    @elseif(is_array($value))

                        <td>
                            @foreach ($value as $item)

                                <li>
                                    {{$item[$array_key][$name]}}
                                </li>
                            @endforeach
                        </td>

                    @else
                        <td> {{$value}}</td>
                    @endif

                </tr>
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
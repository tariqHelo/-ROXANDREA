@extends("layouts.admin")
@section("title", "Manage Menu")


@section("content")
    <a href="{{route('service.create')}}" class="btn btn-success pull-right">Create New menu item</a>
    <table class="table mt-3 table-striped table-bordered" align="center">
        <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>image</th>
            <th>Active</th>
            <th>edit|delete</th>
        </tr>
        </thead>
            <tbody>

            @foreach($services as $service)
        <tr>
            <td>{{ $service->id}}</td>
            <td><img width="100" src='{{ asset("storage/".$service->image)}}' ></td>
            <td><a href="{{ route("rooms.show", $service->id) }}">{{ $service->title }}</a></td>
            <td><input type="checkbox" disabled {{$service->published?"checked":"" }}/></td>
            <td width="20%">
                <form method="post" action="{{ route('service.destroy', $service->id) }}">

                    <a href="{{ route("service.edit", $service->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                    <a href="{{ route("delete-services", $service->id) }}" onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>

                    @csrf
                    @method("DELETE")

                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection

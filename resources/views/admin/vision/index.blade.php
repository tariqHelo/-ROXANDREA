@extends("layouts.admin")
@section("title", "Manage Menu")


@section("content")
    <a href="{{route('vision.create')}}" class="btn btn-success pull-right">Create New menu item</a>
    <table class="table mt-3 table-striped table-bordered" align="center">
        <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>icon</th>
        </tr>
        </thead>
        <tbody>
        @foreach($visions as $vision)
        <tr>
            <td>{{ $vision->id }}</td>
            <td>{{ $vision->title }}</td>
            <td>{{$vision->icon}}</td>
            <td>
               <form method="post" action="{{ route('vision.destroy', $vision->id) }}">
                            <a href="{{ route('vision.edit', $vision->id) }}" class="btn btn-primary btn-sm"><i
                                    class='fa fa-edit'></i></a>
                            <button onclick='return confirm("Are you sure??")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            @csrf
                            @method("DELETE")
                        </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends("layouts.admin")
@section("title", "Manage Menu")


@section("content")
    <a href="{{route('menus.create')}}" class="btn btn-success pull-right">Create New menu item</a>
    <table class="table mt-3 table-striped table-bordered" align="center">
        <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>url</th>
            <th>parent menu</th>
            <th>index</th>
            <th>active</th>
            <th>edit|delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->id }}</td>
            <td>{{ $menu->title }}</td>
            <td>{{$menu->url}}</td>
            <td>{{$menus->find($menu->parent_id)->title ?? ''}}</td>
            <td>{{ $menu->index }}</td>
            <td>
                <input type="checkbox" {{$menu->active?"checked":"" }} disabled name='active' class="form-check-input" id="active">
                <label class="form-check-label" for='active'>active</label>
            </td>
            <td>

                <a href="{{ route('menus.edit' , $menu->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                <a href="{{route('menus.destroy' , $menu->id)}}">
                    <button onclick="return confirm('are you sure ?')" type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                    </button>
                </a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection

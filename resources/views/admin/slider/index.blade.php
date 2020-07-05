@extends("layouts.admin")
@section("title", "Manage Slider")


@section("content")


            <form class='row'>
                <div class="col-sm-3 ">
                    <input autofocus value="{{ request()->get('q') }}" type="text" class="form-control" placeholder="Enter Your Search" name="q"  />
                </div>
                <div class="col-sm-3 ">
                    <select name="published" class="form-control">
                        <option value='' > Any status</option>
                        <option {{ request()->get("published")?"selected":""}} value='1' >active</option>
                        <option {{ request()->get("published") == '0'?"selected":""}} value='0'>Inactive</option>
                    </select>
                </div>

                <div class="col-sm-3 ">
                    <button class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                    <a href="{{ route("sliders.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New </a>

                </div>
            </form>


            <div class="table-scrollable">

                @if($sliders->count()>0)

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> title </th>
                                <th> subtitle </th>
                                <th> url </th>
                                <th> image </th>
                                <th> button_text </th>
                                <th> published </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td> {{$slider->id}} </td>
                                <td> {{$slider->title}} </td>
                                <td> {{$slider->subtitle}} </td>
                                <td> {{$slider->url}} </td>
                                <td> <img src='{{ asset("storage/".$slider->image) }}' width='50' class='img-thumbnail' /></td>
                                <td> {{$slider->button_text}} </td>
                                <td> <input type="checkbox" disabled {{$slider->published?"checked":"" }} /></td>
                                <td width="20%">
                                    <form method="post" action="{{ route('sliders.destroy', $slider->id) }}">
                                        <a href="{{ route("sliders.show", $slider->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                                        <a href="{{ route("sliders.edit", $slider->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                                        <a href="{{ route("delete-Slider", $slider->id) }}" onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>


                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $sliders->links() }}
                @else
                    <div class="alert alert-warning"> Sorry there is no result to your search </div>

                @endif
                </div>


@endsection

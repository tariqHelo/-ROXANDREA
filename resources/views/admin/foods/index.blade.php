@extends("layouts.admin")
@section("title", "Manage Foods")


@section("content")
<div class="portlet light ">


                                    <div class="portlet-body">
                                    <div class='row'>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Enter your search" class="form-control" />
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Enter your search" class="form-control" />
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Enter your search" class="form-control" />
                                        </div>
                                        <div class="col-sm-3">
                                            <button class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                                            <a href="{{route('foods.create')}}" class='btn btn-success'><i class='fa fa-plus'></i> Add New</a>
                                    </div>
                                </div>
                                <hr>
                                    <div class="form-group row">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr class="col">
                                                    <th class="col-2"> Title </th>
                                                    <th class="col-2"> Price </th>
                                                    <th class="col-2"> Details </th>
                                                    <th class="col-2"> Image </th>
                                                    <th class="col-2"> Published </th>
                                                    <th class="col-5"> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($foods as $food)
                                                <tr>
                                                    <td> {{$food->title}} </td>
                                                    <td> {{$food->price}} </td>
                                                    <td> {{ $food->details }}</td>
                                                    <td> <img src="{{asset("storage/".$food->image)}}" width="100"> </td>
                                                    <td> <input {{$food->published?"checked":""}} disabled type="checkbox"> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <form method="post" action="{{ route('foods.destroy', $food->id) }}">
                                                            <a href="{{route('foods.edit',$food->id)}}" type="button" class="btn btn-success">Edit</a>
                                                            <button onclick='return confirm("Are you sure dude?")' type="submit" class="btn btn-danger">Delele</button>
                                                            @csrf
                                                            @method("DELETE")
{{--                                                            <button href={{route("offers.destroy")}} type="button" class="btn btn-danger">Delete</buttonhref>--}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
@endsection

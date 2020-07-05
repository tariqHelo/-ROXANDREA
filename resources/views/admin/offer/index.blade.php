@extends("layouts.admin")
@section("title", "Manage Blogs")


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
                                        <a href="{{route('offers.create')}}" class='btn btn-success'><i class='fa fa-plus'></i> Add New</a>
                                    </div>
                                </div>
                                <hr>
                                    <div class="form-group row">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr class="col">
                                                    <th class="col-2"> Title </th>
                                                    <th class="col-2"> Options </th>
                                                    <th class="col-2"> Image </th>
                                                    <th class="col-2"> Published </th>
                                                    <th class="col-5"> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($offers as $offer)

                                                <tr>
                                                    <td> {{$offer->title}} </td>
                                                    <td> {{$offer->options}} </td>
                                                    <td> <img src="{{asset("storage/".$offer->image)}}" width="100"> </td>
                                                    <td> <input {{$offer->published?"checked":""}} type="checkbox"> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <form method="post" action="{{ route('offers.destroy', $offer->id) }}">
                                                            <a href="{{route('offers.edit',$offer->id)}}" type="button" class="btn btn-success">Edit</a>
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

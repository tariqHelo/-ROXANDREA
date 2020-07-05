@extends("layouts.admin")
@section("title", "Manage Blogs")
@section("content")
<div class="portlet light ">


       <form class="portlet-body">
                                <div class='row'>
                                    <div class="col-sm-3">
                                        <input name="q" autofocus type="text" placeholder="Enter your search" value='{{ request()->get("q") }}' class="form-control" />
                                    </div>
                                    <div class="col-sm-3">
                                    <select name="category" class="form-control">
                                     <option value=''>Any Category</option>
                                      @foreach($categories as $category)
                                    <option {{$category->id==request()->get('category')?"selected":""}} value='{{$category->id}}'>{{$category->title}}</option>
                               @endforeach
                             </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <select name="published" class="form-control">
                                    <option value=''>Any Status</option>
                                    <option {{ request()->get("published") ?"selected":"" }} value='1'>Active</option>
                                    <option {{ request()->get("published")=='0' ?"selected":"" }} value='0'>Inactive</option>
                            </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                                        <a href="{{ route('blogs.create') }}" class='btn btn-success'><i class='fa fa-plus'></i> Add New</a>
                                    </div>
                                    </div>
                                </form>
                                <hr>
                                    @if($blogs->count()>0)
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="100">Image</th>
                                                    <th> Title </th>
                                                    <th>Category</th>
                                                    <th> Status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($blogs as $blog)
                                                <tr>
                                                <td><img width='100' src='{{ asset("storage/".$blog->image) }}' /></td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->category->title }}</td>
                                                    <td>
                                                        <span class="label label-sm label-info"> {{ $blog->published?"Active":"Not Active" }} </span>
                                                    </td>
                                                    <td width="20%">
                     
                    <form method="post" action="{{ route('blogs.destroy', $blog->id) }}">
            
                        <a href="{{ route("blogs.edit", $blog->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                        <button onclick='return confirm("Are you sure ?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

{{ $blogs->links() }}
@else
    <div class='alert alert-warning'>Sorry, there is no results to your search</div>
@endif
                                </div>
   
                            </div>

@endsection

@extends("layouts.admin")
@section("title", "Manage Blogs")


@section("content")
<form  action="{{route('foods.update',$foods->id)}}" method="post" enctype="multipart/form-data">
@method("PATCH")
    @csrf
    <div class="row" >

        <div class="col-sm-7">
            <div class="form-group">
                <label for="title">Title</label>
                <input  value='{{ $foods->title}}' type="text" autofocus class="form-control {{ $errors->has('title')?"is-invalid":""}}"  id="title" name="title" placeholder="Enter Offers Title">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="price">Price</label>
                <input  value='{{ $foods->price}}' type="text" autofocus class="form-control {{ $errors->has('price')?"is-invalid":""}}"  id="price" name="price" placeholder="Enter Offers Price">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control {{ $errors->has('details')?"is-invalid":""}}"
                id="details" name="details" placeholder="Enter Offers details">{{ $foods->details }}</textarea>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="Image">Image</label>
                <input  value='{{ $foods->image}}' type="file" autofocus class="form-control {{ $errors->has('image')?"is-invalid":""}}"  id="image" name="imageFile" placeholder="Enter Offers Image">
                <img src="{{asset("storage/".$foods->image)}}" width="150">
            </div>
        </div>

        <div class="col-sm-7">
            <div class="form-group">
                <label for="published">Published</label>
                <input  {{ $foods->published?"checked":""}}   value="1" type="checkbox" class="form-controshow" id="published" name="published">
            </div>
        </div>

        <div class="card-footer col-sm-7">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class='btn btn-danger' href='{{ route("foods.index") }}'>Cancel</a>
        </div>


    </div>
</form>

@endsection

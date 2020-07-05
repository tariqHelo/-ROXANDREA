@extends("layouts.admin")
@section("title", "Manage Blogs")


@section("content")
<form  action="{{route('offers.update',$offer->id)}}" method="post" enctype="multipart/form-data">
@method("PATCH")
    @csrf
    <div class="row" >

        <div class="col-sm-7">
            <div class="form-group">
                <label for="title">Title</label>
                <input  value='{{ $offer->title}}' type="text" autofocus class="form-control {{ $errors->has('title')?"is-invalid":""}}"  id="title" name="title" placeholder="Enter Offers Title">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="options">Options</label>
                <textarea class="form-control {{ $errors->has('options')?"is-invalid":""}}"
                id="options" name="options" placeholder="Enter Offers options">{{ $offer->options }}</textarea>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="Image">Image</label>
                <input  value='{{ $offer->image}}' type="file" autofocus class="form-control {{ $errors->has('image')?"is-invalid":""}}"  id="image" name="imageFile" placeholder="Enter Offers Image">
                <img src="{{asset("storage/".$offer->image)}}" width="150">
            </div>
        </div>

        <div class="col-sm-7">
            <div class="form-group">
                <label for="published">Published</label>
                <input  {{ $offer->published?"checked":""}}   value="1" type="checkbox" class="form-controshow" id="published" name="published">
            </div>
        </div>

        <div class="card-footer col-sm-7">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class='btn btn-danger' href='{{ route("offers.index") }}'>Cancel</a>
        </div>


    </div>
</form>

@endsection

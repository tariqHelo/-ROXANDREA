@extends("layouts.admin")
@section("title", "Manage Foods")


@section("content")
<form  action="{{route('foods.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="row" >

        <div class="col-sm-7">
            <div class="form-group">
                <label for="title">Title</label>
                <input  value='{{ old('title') }}' type="text" autofocus class="form-control {{ $errors->has('title')?"is-invalid":""}}"  id="title" name="title" placeholder="Enter Offers Title">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="Price">Price</label>
                <input  value='{{ old('price') }}' type="text" autofocus class="form-control {{ $errors->has('price')?"is-invalid":""}}"  id="price" name="price" placeholder="Enter Offers price">
            </div>
        </div>
         <div class="col-sm-7">
            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" id="details" name="details">{{ old('details') }}</textarea>
            </div>
        </div>
         
        <div class="col-sm-7">
            <div class="form-group">
                <label for="Image">Image</label>
                <input  value='{{ old('image') }}' type="file" autofocus class="form-control {{ $errors->has('image')?"is-invalid":""}}"  id="image" name="imageFile" placeholder="Enter Offers Image">
            </div>
        </div>

        <div class="col-sm-7">
            <div class="form-group">
                <label for="published">Published</label>
                <input  {{ old('published') }}   value="1" type="checkbox" class="form-controshow" id="published" name="published">
            </div>
        </div>

        <div class="card-footer col-sm-7">
            <button type="submit" class="btn btn-primary">Add New</button>
            <a class='btn btn-danger' href='{{ route("foods.index") }}'>Cancel</a>
        </div>


    </div>
</form>

@endsection

@extends("layouts.admin")

@section("title", "Create Services")

@section("content")
    <form method="post" enctype="multipart/form-data" action="{{ route('service.store') }}" role="form">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label for="title">Menu title</label>
                <input value='{{ old('title') }}' type="text" autofocus class="form-control" id="title" name="title"
                       placeholder="Enter Menu Title">
            </div>

    <div class="form-group row">
        <div class='col-sm-6'>
            <label for="image">Image</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image">
            </div>
        </div>
    </div>


    <div class="form-check">
        <input {{ old('published')?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
        <label class="form-check-label" for='published'>Published</label>
    </div>


            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-default' href='{{ route("service.index") }}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection

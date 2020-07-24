@extends("layouts.admin")

@section("title", "Create Services")

@section("content")
    <form method="post" enctype="multipart/form-data" action="{{ route('service.update' , $services->id) }}" role="form">
        @csrf
       @method('PUT')
        <div class="card-body">

                    <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="text" class="form-control" id="form_control_1" name="title" value="{{$services->title}}" placeholder="Enter your Title">
                        <label for="form_control_1">Title</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div>

          <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="file" name="image" class="form-control custom-file-input" id="form_control_1">
                        <label for="form_control_1">Image</label>
                    </div>
                    <div>
                        <img src="{{asset("storage/".$services->image)}}" width='240' class='img-thumbnail'>
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

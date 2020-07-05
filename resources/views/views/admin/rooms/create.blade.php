@extends("layouts.admin")
@section("title", "Create Room")


@section("content")
    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="{{route('rooms.store')}}">
                @csrf

                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="text" class="form-control" id="form_control_1" name="title" value="{{old('title')}}" placeholder="Enter your Title">
                        <label for="form_control_1">Title</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="text" class="form-control" id="form_control_1" name="price" value="{{old('price')}}" placeholder="Enter your name">
                        <label for="form_control_1">Price</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="file" name="imageFile" class="form-control custom-file-input" id="form_control_1">
                        <label for="form_control_1">Image</label>
                    </div>
                </div>
                <div class="md-checkbox-inline">
                    <div class="md-checkbox">
                        <input type="checkbox" id="checkbox6" class="md-check" name="published" value="1"  {{old('published')?"checked":""}} >
                        <label for="checkbox6">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Published </label>
                    </div>
                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn btn-success">Add Room</button>
                    <a type="reset" href="{{route('rooms.index')}}" class="btn default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

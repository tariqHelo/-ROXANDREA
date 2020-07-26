@extends("layouts.admin")

@section("title", "Create Blog")

@section("css")
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("content")
<div class="portlet light ">
        <div class="portlet-body form">
<form method="post" enctype="multipart/form-data" action="{{ route('blogs.store') }}" role="form">

    @csrf
               <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title" value="{{old('title')}}" placeholder="Enter your Title">
                        
                    </div>
                </div>
            <div class="form-group has-success">
                <label for="form_control_1">Category</label>
                <select name="category_id" class="form-control" >
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option {{old('category_id')== $category->id?"selected":""}} value='{{$category->id}}'>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
    </div>     
    
    <div class="form-group row">
        <div class='col-sm-6'>
            <label for="imageFile">Image</label>
            <div class="custom-file">
                <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
            </div>
        </div>
    </div>

     <div class="form-body">
            <div class="form-group has-success">
               <label for="summary">Summary</label>        
        <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>       
            </div> 
    </div>
    <div class="form-group">
        <label for="details">Details</label>
        <textarea class="form-control" id="details" name="details">{{ old('details') }}</textarea>
    </div>

    
    <div class="form-check">
        <input {{ old('published')?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
        <label class="form-check-label" for='published'>Published</label>
    </div>
    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("blogs.index") }}'>Cancel</a>
    </div>
</form>
</div>
    </div>
@endsection

@section("js")
<!-- <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> -->
    <script type="text/javascript">
    /*$(document).ready(function () {
      bsCustomFileInput.init();
    });*/
    </script>

<script src="{{ asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
<script>
$("#details").summernote({height:300});
</script>
@endsection

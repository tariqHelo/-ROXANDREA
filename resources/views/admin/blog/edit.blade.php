@extends("layouts.admin")

@section("title", "Edit Blog")

@section("content")
<div class="portlet light ">
        <div class="portlet-body form">
<form role="form" method="post" enctype="multipart/form-data" action="{{ route('blogs.update', $blog->id) }}" role="form">
    @csrf
    @method("put")
   
               <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="text" class="form-control" id="form_control_1" name="title" value="{{ $blog->title }}">
                        <label for="form_control_1">Title</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div>

            <div class="form-body">
               <div class="form-group has-success">
                <label for="form_control_1">Category</label>
                <select name="category_id" class="form-control input-lg" >
                    @foreach($categories as $category)
                        <option {{$category->id == $blog->category_id?"selected":""}} value='{{$category->id}}'>{{$category->title}}</option>
                    @endforeach
                </select>
               </div>
            </div>

                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <textarea class="form-control" id="form_control_1" name="details">{{ $blog->details }}</textarea>
                        <label for="form_control_1">Details</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div> 
<!-- 
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <textarea class="form-control" id="form_control_1" name="summary" >{{ $blog->summary }}</textarea>
                        <label for="form_control_1">Summary</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div> -->
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                       <label for="form_control_1">Summary</label> 
                        
                        <div name="summary" id="summernote_1">{{ $blog->summary }}</div>  
                        
                    </div> 
                </div>
              <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="file" name="imageFile" class="form-control custom-file-input" id="form_control_1">
                        <label for="form_control_1">Image</label>
                    </div>
                    <div>
                     @if($blog->image)
                        <img src="{{asset("storage/".$blog->image)}}" width='240' class='img-thumbnail'>
                     @endif
                    </div>
                </div>
               <div class="md-checkbox-inline">
                    <div class="md-checkbox">
                        <input type="checkbox" id="checkbox6" class="md-check" name="published" value="1" {{ (old('published')?? $blog->published)?"checked":"" }}>
                        <label for="checkbox6">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Published </label>
                    </div>
                </div>
   
              <div class="form-actions noborder">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a type="reset" href="{{route('blogs.index')}}" class="btn default">Cancel</a>
                </div>
           </form>
        </div>
     </div>
@endsection
@section("js")
<<<<<<< HEAD
<!-- <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> -->
    <script type="text/javascript">
    /*$(document).ready(function () {
      bsCustomFileInput.init();
    });*/
    </script>
<script src="{{ asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
<!--script src="{{ asset('metronic/assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script-->
<script>
$("#details").summernote({height:300});
</script>
@endsection

@section("css")
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
@endsection

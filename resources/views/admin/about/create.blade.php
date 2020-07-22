@extends("layouts.admin")

@section("title", "Create About")

@section("css")
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("content")
<div class="portlet light ">
        <div class="portlet-body form">
<form method="post" enctype="multipart/form-data" action="{{ route('about.store') }}" role="form">

    @csrf
        <div class="form-body">
             <div class="form-group has-success"><label for="form_control_1">Title</label>
            <input type="text" class="form-control" id="form_control_1" name="title" value="{{old('title')}}" placeholder="Enter your Title">  
            </div>
         </div>
    </div>     
  
      <div class="form-group row">
             <label class="col-md-1 control-label">Facebook</label>
               <div class="col-sm-8">
                         <div class="input-group">
                            <span class="input-group-addon">
                                 <i class="fa fa-facebook-f"></i>
                             </span>
                        <input type="url" name="facebook" class="form-control" placeholder="Facebook Link"
                    value="@if(old('facebook')){{old('facebook')}} @elseif(isset($settings->facebook)){{$settings->facebook}} @else {{''}}@endif"></div>
              </div>
          </div>
            <div class="form-group row">
                    <label class="col-md-1 control-label">Twitter</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-twitter"></i>
                                </span>
                        <input type="url" required name="twitter" class="form-control"
                     placeholder="Twitter Link" value="@if(old('twitter')){{old('twitter')}} @elseif(isset($settings->twitter)){{$settings->twitter}} @else {{''}}@endif"></div>
                </div>
            </div>
                <div class="form-group row">
                     <label class="col-md-1 control-label">Instagram</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-instagram"></i>
                                </span>
                                <input type="url" required name="instagram" class="form-control"
                        placeholder="Instagram Link" value="@if(old('instagram')){{old('instagram')}} @elseif(isset($settings->instagram)){{$settings->instagram}} @else {{''}}@endif"></div>
                </div>
            </div>
              <div class="form-group row">
        <div class='col-sm-6'>
            <label for="image">Image</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image">
            </div>
        </div>
    </div>
     <div class="form-body">
            <div class="form-group has-success">
               <label for="description">description</label>        
             <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>       
            </div> 
    </div>

    <div class="form-check">
        <input {{ old('published')?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
        <label class="form-check-label" for='published'>Published</label>
    </div>
    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("about.index") }}'>Cancel</a>
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
        $("#description").summernote({height:300});
    </script>

@endsection

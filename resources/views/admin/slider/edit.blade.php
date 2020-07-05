@extends("layouts.admin")
@section("title", "Edit Slider")

@section("content")
<form role="form" enctype="multipart/form-data" method="post" action="{{ route("sliders.update", $sliders->id)  }}">
        <!--input type="hidden" name="_method" value="PUT" /-->
        @method('PATCH')
        @csrf

    <div class="form-group">
        <label for="title">Slider Title</label>
        <input type="text" value='{{ $sliders->title }}'class=" form-control" id="title" name="title" placeholder="Enter Category Title">
    </div>
    <div class="form-group">
        <label for="subtitle">Slider subtitle</label>
        <input type="text" value='{{ $sliders->subtitle }}'class=" form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
    </div>
    <div class="form-group">
        <label for="url">Slider url</label>
        <input type="text" value='{{ $sliders->url }}'class=" form-control" id="url" name="url" placeholder="Enter url">
    </div>
    <div class="form-group">
        <label for="button_text">button_text</label>
        <input type="text" value='{{ $sliders->button_text }}'class=" form-control" id="button_text" name="button_text" placeholder="">
    </div>
    <div class="form-group row">
        <div class='col-sm-6'>
            <label for="imageFile">Image</label>
            <div class="custom-file">
                <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
            @if($sliders->image)
                <img src='{{ asset("storage/".$sliders->image) }}' width='80' class='img-thumbnail mt-3' />
            @endif
        </div>
    </div>
    <div class="form-check">

        <input {{ $sliders->published?"checked":"" }} value='1' type="checkbox"  name="published" class="form-check-input" id="published">
        <label class="form-check-label" for="published">published</label>
    </div>




    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
        <a class='btn btn-default' href='{{ route("sliders.index") }}'>Cancel</a>
    </div>
</form>

@endsection
@section("js")
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>


@endsection

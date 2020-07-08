@extends("layouts.admin")

@section("title", "Create sliders")

@section("content")
<form method="post" enctype="multipart/form-data" action="{{ route('sliders.store') }}" role="form">
    @csrf

    <div class="card-body">

            <div class="form-group">
                <label for="title">News title</label>
                <input value='{{ old('title') }}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter News Title">
            </div>



            <div class="form-group">
                <label for="subtitle">subtitle</label>
                <input value='{{ old('subtitle') }}' type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
            </div>


            <div class="form-group">
                <label for="url">url</label>
                <input value='{{ old('url') }}' type="text" class="form-control" id="url" name="url" placeholder="Enter url">
            </div>


            <div class="form-group">
                <label for="button_text">text</label>
                <input value='{{ old('button_text') }}' type="text" class="form-control" id="button_text" name="button_text" placeholder="Enter text">
            </div>


            <div class="form-group">
                <label for="imageFile">Image</label>
                <div class="custom-file">
                    <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>




        <div class="form-check">
            <input  {{old('published')?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
            <label class="form-check-label" for='published'>Published</label>
        </div>


        <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a class='btn btn-default' href='{{ route("sliders.index") }}'>Cancel</a>
    </div>
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

@extends("layouts.admin")

@section("title", "Create sliders")

@section("content")
    <form method="post" action="{{ route('vision.store') }}" role="form">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label for="title"> Title</label>
                <input value='{{ old('title') }}' type="text" autofocus class="form-control" id="title" name="title"
                       placeholder="Enter Menu Title">
            </div>

            

            <div class="form-group url">
                <label for="icon">Icon</label>
                <input value='{{ old('icon') }}' type="text" class="form-control" id="icon" name="icon"
                       placeholder="Enter Menu icon">
            </div>


            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-default' href='{{ route("vision.index") }}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection

@section("js")
    <script type="text/javascript">
        $(document).ready(function () {
            $("#is_route").change(function(){
                if($(this).is(":checked")){
                    $(".routes").show();
                    $(".url").hide();
                }
                else{
                    $(".routes").hide();
                    $(".url").show();                
                }
            }).change();
        });
    </script>


@endsection

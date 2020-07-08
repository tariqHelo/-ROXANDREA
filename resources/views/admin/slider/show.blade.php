@extends("layouts.admin")

@section("title",  "show")

@section("content")
    <div class="form-group">
        <label for="title">Slider Title</label>
        <input type="text" value='{{ $sliders->title }}' readonly class=" form-control" id="title" name="title" placeholder="Enter Category Title">
    </div>
    <div class="form-group">
        <label for="subtitle">Slider subtitle</label>
        <input type="text" value='{{ $sliders->subtitle }}' readonly class=" form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
    </div>
    <div class="form-group">
        <label for="url">Slider url</label>
        <input type="text" value='{{ $sliders->url }}' readonly class=" form-control" id="url" name="url" placeholder="Enter url">
    </div>
    <div class="form-group">
        <label for="button_text">button_text</label>
        <input type="text" value='{{ $sliders->button_text }} ' readonly class=" form-control" id="button_text" name="button_text" placeholder="">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <br>
        @if($sliders->image)
            <img src='{{ asset("storage/".$sliders->image) }}' width='280' class='img-thumbnail' />
        @endif
    </div>
    <div class="form-check">

        <input {{ $sliders->published}}  type="checkbox"  name="published" class="form-check-input" id="published">
        <label class="form-check-label" for="published">published</label>
    </div>




    <div class="card-footer mt-3">

        <a class='btn btn-default' href='{{ route("sliders.index") }}'>Cancel</a>
    </div>
    </form>
</form>
@endsection

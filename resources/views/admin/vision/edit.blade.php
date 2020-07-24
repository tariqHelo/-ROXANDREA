@extends("layouts.admin")

@section("title", "Create sliders")

@section("content")
    <form action="{{ route('vision.update' , $visions->id) }}" method="post" role="form">
        @csrf
        @method('PATCH')
        <div class="card-body">

            <div class="form-group">
                <label for="title">Menu title</label>
                <input value='{{ old('title') ?? $visions->title }}' type="text" autofocus class="form-control" id="title" name="title"
                       placeholder="Enter Menu Title">
            </div>
            <div class="form-group url">
                <label for="icon">Icon</label>
                <input value='{{ $visions->icon }}' type="text" class="form-control" id="icon" name="icon"
                       placeholder="Enter Menu icon">
            </div>

            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-default' href='{{ route("vision.index") }}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection

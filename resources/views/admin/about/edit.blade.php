@extends("layouts.admin")

@section("title", "Create sliders")

@section("content")
    <form action="{{ route('menus.update' , $menu->id) }}" method="post" role="form">
        @csrf
        @method('PATCH')
        <div class="card-body">

            <div class="form-group">
                <label for="title">Menu title</label>
                <input value='{{ old('title') ?? $menu->title }}' type="text" autofocus class="form-control" id="title" name="title"
                       placeholder="Enter Menu Title">
            </div>


            
            <div class="form-check">
                <input type="hidden" value='0' name='is_route' />
                <input {{$menu->is_route?"checked":"" }} value='1' type="checkbox" name='is_route' class="form-check-input"
                       id="is_route">
                <label class="form-check-label" for='is_route'>Is Route</label>
            </div>
            <div class="form-group routes">
                <label for="subtitle">Routes</label>
                <select class='form-control' id="routes" name="routes">
                    <option value=''>Select Route</option>
                    @foreach(\App\Models\Menu::$routes as $key=>$value)
                        <option {{ $key==$menu->url?"selected":""}} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group url">
                <label for="subtitle">URL</label>
                <input value='{{ $menu->url }}' type="text" class="form-control" id="url" name="url"
                       placeholder="Enter Menu URL">
            </div>


            <div class="form-group">
                <label>select parent menu if exist</label>
                <select name="parent_id" class="form-control">
                    <option value="0">main menu</option>
                    @foreach($menus as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $menu->parent_id ? 'selected' : '' }}>{{ $item->title}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="button_text">index</label>
                <input value='{{ old('index') ?? $menu->index }}' type="number" class="form-control" id="button_text" name="index"
                       placeholder="Enter index number">
            </div>


            <div class="form-check">
                <input {{$menu->active?"checked":"" }}  type="checkbox" name='active' class="form-check-input"
                       id="active">
                <label class="form-check-label" for='active'>active</label>
            </div>
            <input type="hidden" value="{{ request()->route('menu') }} " name="id">

            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-default' href='{{ route("menus.index") }}'>Cancel</a>
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

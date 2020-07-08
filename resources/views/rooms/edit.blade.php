@extends("layouts.admin")
@section("title", "Edit Rooms")


@section("content")


<form  role="form" method="post" enctype="multipart/form-data" action="{{ route("rooms.update", $rooms->id) }}">
    @csrf
    @method('PATCH')
                    <div class="card-body">
                    <div class="form-group">
                        <label for="title">Room Title</label>
                        <input type="text" value='{{ $rooms->title }}' class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter Room Title ">
                      </div>
    
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" value='{{ $rooms->price }}' class="{{ $errors->has('price')?"is-invalid":""}} form-control" id="price" name="price" placeholder="Enter Price">
                      </div>
    
    
                <div class="form-group row">
                  <div class='col-sm-6'>
                      <label for="imageFile">Image</label>
                      <div class="custom-file">
                          <input type="file" name="imageFile"  id="imageFile">
                          <label class="custom-file-label" for="image"></label>
                      </div>
                      @if($rooms->image)
                          <img src='{{ asset("storage/".$rooms->image) }}' width='240' class='img-thumbnail mt-3' />
                      @endif
                  </div>
              </div>
              
                <div class="form-check">
                        <input {{ $rooms->published?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
                        <label class="form-check-label" for='published'>Published</label>
                      </div>
                    
                      
                      
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a class='btn btn-default' href='{{  route("rooms.index")}}'>Cancel</a>
                    </div>
                  </form>
    @endsection
    

    
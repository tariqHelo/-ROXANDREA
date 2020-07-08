@extends("layouts.admin")
@section("title",  "Show $bookings->name")
@section("content")



<form  role="form">
    <div class="card-body">
    <div class='row'>
        <div class='col-xs-6'>
    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" value='{{ $bookings->name }}' readonly class="{{ $errors->has('name')?"is-invalid":""}} form-control" id="name" name="name" >
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" value='{{ $bookings->email }}' readonly class="{{ $errors->has('email')?"is-invalid":""}} form-control" id="email" name="email" >
      </div>
        </div>
        <div class='col-xs-6'>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" value='{{ $bookings->phone }}' readonly class="{{ $errors->has('phone')?"is-invalid":""}} form-control" id="phone" name="phone">
      </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-6'>
      <div class="form-group">
        <label for="check_in">Check in</label>
        <input type="date" value='{{ $bookings->check_in }}' readonly class="{{ $errors->has('check_in')?"is-invalid":""}} form-control" id="check_in" name="check_in" >
      </div>
       <div class="form-group">
        <label for="Check out">Check out</label>
        <input type="date" value='{{ $bookings->check_out }}' readonly class="{{ $errors->has('check_out')?"is-invalid":""}} form-control" id="check_out" name="check_out" >
      </div>
        </div>
        <div class='col-xs-6'>
      <div class="form-group">
        <label for="adults">Adults</label>
        <input type="number" value='{{ $bookings->adults }}' readonly class="{{ $errors->has('adults')?"is-invalid":""}} form-control" id="adults" name="adults" >
      </div>
      <div class="form-group">
        <label for="children">Children</label>
        <input type="number" value='{{ $bookings->children}}' readonly class="{{ $errors->has('children')?"is-invalid":""}} form-control" id="children" name="children" >
      </div>
        </div>
    </div>
      <div class="row">
      <div class="col-sm-6">
     
            <label for="offer_id">Offer</label>
            <select  disabled name="offer_id" class="form-control">
                <option>Select Offer</option>
                @foreach($offers as $offer)
                    <option  {{$offer->id == $bookings->offer_id?"selected":""}} value='{{$offer->id}}'>{{$offer->id}}-{{$offer->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-6">
     
            <label for="room_id">Room Type</label>
            <select  disabled name="room_id" class="form-control">
                <option>Select Room Type</option>
                @foreach($rooms as $room)
                    <option  {{$room->id == $bookings->room_id?"selected":""}} value='{{$room->id}}'>{{$room->id}}-{{$room->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>
@endsection

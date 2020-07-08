
@extends("layouts.admin")
@section("title", "Bookings")


@section("content")

<form class="row mb-3">
    <div class="col-sm-4">
        <input autofocus value="{{ request()->get("q") }}" type="text" class="form-control"
                    placeholder="Search By Name" name="q"  />
    </div>
</form>

<div class="table-scrollable">

@if($bookings->count()>0)

    <table align="center" class="table table-striped mt-3 table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
       
            
            </tr>
        </thead>
        <tbody>

            @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id}}</td>
            

            <td><a href="{{ route("bookings.show", $booking->id) }}">{{ $booking->name }}</a></td>

            

               
            @endforeach
        </tbody>
    </table>
{{ $bookings->links() }}

@else

    <div class="alert alert-warning"> Sorry there is no result to your search </div>

@endif


@endsection



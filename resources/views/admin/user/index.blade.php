@extends("layouts.admin")
@section("title", "Manage User")


@section("content")



            <form class='row'>
                <div class="col-sm-8 ">
                    <input autofocus value="{{ request()->get('q') }}" type="text" class="form-control" placeholder="Enter Your Search" name="q"  />
                </div>

                <div class="col-sm-3 ">
                    <button class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                    <a href="{{ route("users.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New user</a>

                </div>
            </form>


            <div class="table-scrollable">

                @if($users->count()>0)

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Created At</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{$user->name}} </td>
                                <td>{{$user->email}}</td>
                               {{-- <td> {{$user-> email_verified_at }}</td>--}}
                                <td> {{$user->created_at}} </td>

                                <td width="20%">
                                    <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                        <a href="{{ route("users.show", $user->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                                        <a href="{{ route("users.edit", $user->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                                        <a href="{{ route("delete-user", $user->id) }}" onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>


                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                @else
                    <div class="alert alert-warning"> Sorry there is no result to your search </div>

                @endif
                </div>



@endsection

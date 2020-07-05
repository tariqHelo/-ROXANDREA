@extends("layouts.admin")
@section('title' , 'Settings')
@section("content")

    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-blue-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">settings</span>
                <span class="caption-helper">form to edit settings</span>
            </div>

        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('post-settings') }}" method="post" class="form-horizontal">
                @method('POST')
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">title</label>
                        <div class="col-md-4">
                            <input type="text" required class="form-control" name="title"
                                   placeholder="Enter Site Title" value="@if(old('title')){{old('title')}} @elseif(isset($settings->title)){{$settings->title}}@else{{''}}@endif">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email </label>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <i class="fa fa-envelope"></i>
                                <input type="email" required name="email" class="form-control"
                                       placeholder="Email Address" value="@if(old('email')){{old('email')}} @elseif(isset($settings->email)){{$settings->email}} @else {{''}}@endif"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Facebook</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-facebook-f"></i>
                                </span>
                                <input type="url" name="facebook" class="form-control" placeholder="Facebook Link"
                                       value="@if(old('facebook')){{old('facebook')}} @elseif(isset($settings->facebook)){{$settings->facebook}} @else {{''}}@endif"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Twitter</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-twitter"></i>
                                </span>
                                <input type="url" required name="twitter" class="form-control"
                                       placeholder="Twitter Link" value="@if(old('twitter')){{old('twitter')}} @elseif(isset($settings->twitter)){{$settings->twitter}} @else {{''}}@endif"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Instagram</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-instagram"></i>
                                </span>
                                <input type="url" required name="instagram" class="form-control"
                                       placeholder="Instagram Link" value="@if(old('instagram')){{old('instagram')}} @elseif(isset($settings->instagram)){{$settings->instagram}} @else {{''}}@endif"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <i class="fa fa-map"></i>
                                <input type="text" required name="address" class="form-control" placeholder="address"
                                       value="@if(old('address')){{old('address')}} @elseif(isset($settings->address)){{$settings->address}} @else{{''}}@endif"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <i class="fa fa-mobile-phone"></i>
                                <input type="number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required name="phone" class="form-control" placeholder="Phone Number" value="@if(old('phone')){{old('phone')}}@elseif(isset($settings->phone)){{$settings->phone}}@else{{'m'}}@endif">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <input type="submit" class="btn green"></input>
                            <a href="{{route('settings')}}">
                                <button type="button" class="btn default">Cancel</button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection

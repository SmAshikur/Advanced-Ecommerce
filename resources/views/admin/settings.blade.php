@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="m2">
            @if(Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('fail')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Password Update</h4>
            </div>
           <form action="{{url('/settings')}}" method="post" >@csrf
            <div class="card-body px-5">
                <div class="form-group">
                    <label>Name:</label>
                    <input value="{{$admin->name}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Current Password:</label>
                    <input id="old_pwd" name="old_pwd" class="form-control" type="password"
                    placeholder="Enter Current password">
                    <span id="old_span" class="text-danger "></span>
                </div>
                <div class="form-group">
                    <label>New Password:</label>
                    <input id="new_pwd" name="new_pwd" class="form-control" type="password"
                    placeholder="Enter New password">
                    <span id="new_span" ></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input id="confirm_pwd" name="confirm_pwd" class="form-control" type="password"
                    placeholder="Enter Confirm password">
                    <span id="confirm_span" class="text-danger "></span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button id="ashik" type="submit" class="btn btn-success">Change Password</button>
            </div>
           </form>

        </div>
    </div>
    <div class="col-md-6">
        <div class="m2">
            @if(Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('fail')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Password Update</h4>
            </div>
           <form action="{{url('/update/admin')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="card-body px-5">
                <div class="form-group">
                    <label>Name:</label>
                    <input  type="text"  value="{{$admin->name}}" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text"  value="{{$admin->email}}" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Type:</label>
                    <input  type="text" value="{{$admin->type}}" class="form-control" name="type">
                </div>
                <div class="form-group">
                    <label>Mobile:</label>
                    <input  type="text" value="{{$admin->mobile}}" class="form-control" name="mobile">
                </div>
                <div class="form-group">
                    <label>Admin Image:</label>
                    <input type="file" value="{{$admin->status}}" class="form-control" name="image">
                    <div class="d-flex justify-content-center mt-1">
                        @if(!empty($admin->image))
                                          <a target="_blank" href="{{url('images/admin/'.$admin->image)}}" >
                                             <img src="{{asset('images/admin/'.$admin->image)}}" height="70px" width="90px"></a>
                                          <input type="hidden" name="current_img" value="{{$admin->image}}">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Status:</label>
                    <input type="radio" value="1" name="status" @if($admin->status=='1') checked="checked" @endif> ON
                    <input type="radio" value="0" name="status" @if($admin->status=='0') checked="checked" @endif> OFF
                </div>

            </div>
            <div class="card-footer d-flex justify-content-center">
                <button id="ashik" type="submit" class="btn btn-success">Update Details</button>
            </div>
           </form>

        </div>
    </div>
</div>




@endsection

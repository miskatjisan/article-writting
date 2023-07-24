@extends('writer.layouts.master')
@section('title','Writer | Dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="{{asset('assets/img/'.$data->image)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$data->username}}</h3>

                <p class="text-muted text-center">Article Writer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Total Earning</b> <a class="float-right">{{$UserTotalBalance}} {{$setting->currency}}</a>
                  </li>
                  
                </ul>

                <a href="{{route('withdrow')}}" class="btn btn-primary btn-block"><b>Withdrow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Full Name</strong>

                <p class="text-muted">
                {{$data->fname}} {{$data->lname}} {{$data->username}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Email Address</strong>

                <p class="text-muted">{{$data->email}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Phone Number</strong>

                <p class="text-muted">
                {{$data->phone}}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> National Identity</strong>

                <p class="text-muted"> {{$data->nid}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><strong>Change Your Profile Details</strong></a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id=" " placeholder="First Name" name="fname" value="{{$data->fname}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id=" " placeholder="Last Name" name="lname" value="{{$data->lname}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">Userame</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id=" " placeholder="Userame" name="username" value="{{$data->username}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">Email Address</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id=" " placeholder="Email Address" name="email" value="{{$data->email}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" id=" " placeholder="Phone Number" name="phone" value="{{$data->phone}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">National Identity</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id=" " placeholder="National Identity" name="nid" value="{{$data->nid}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">Chnage Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id=" " placeholder="Enter Your New Password" name="password" value="{{$data->password}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for=" " class="col-sm-2 col-form-label">User Profile Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id=" "  name="image">
                          <br>
                          <img src="{{asset('assets/img/'.$data->image)}}" style="width:50px;height:50px;" alt="profile Image">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
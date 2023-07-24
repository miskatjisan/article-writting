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
            <h1>Create Your Article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Article</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-outline card-info">
           
            <!-- /.card-header -->
        <form action="{{route('save.article')}}" method="post" enctype="multipart/form-data" >
              @csrf
        <div class="card-body" oncontextmenu="return false;">
          <div class="form-group">
              <input type="hidden" name="userid" value="{{$data->id}}">
              <input type="hidden" name="username" value="{{$data->username}}">
          </div>
            <div class="form-group">
              <label for="exampleInputTitle">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Your Title">
            </div>

            <div class="form-group">  
            <label for="exampleInputArticle">Write Your Article</label> 
              <textarea name="article" id="summernote">
              </textarea>
            </div>

              <div class="form-group">
                <label for="exampleInputFile">Upload Image</label>
               <input type="file" name="image" class="form-control" id="exampleInputFile">
            </div>

            <div class="form-group">
              @foreach($settings as $setting)
            <input type="hidden" name="articleprice" value="{{$setting->articleprice}}">
            <input type="hidden" name="currency" value="{{$setting->currency}}">
            @endforeach
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-info mt-5">Create Article</button>
            </div>
            
          </div>
        </form>
         
          </div>
</div>
</div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
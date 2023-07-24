@extends('writer.layouts.master')
@section('title','Writer | Article')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Articles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Article</a></li>
              <li class="breadcrumb-item active">All</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
       
           
            <!-- /.card-header -->
     
          @foreach($articles as $article)
     <div class="card mb-3">
     <p class="card-text">  <strong>Earn: </strong><small class="text-muted text-right"> {{$article->articleprice}}</small> <small class="text-muted">{{$article->currency }}</small>
</p>
  <img src="{{asset('assets/img/'.$article->image )}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-size: 2.1rem;">{{$article->title}}</h5>
    <p class="card-text  mt-5" style="font-size: 1.50rem;">{{$article->article}}</p>
    <p class="card-text">  <strong>Author: </strong><small class="text-muted text-right"> {{$article->username}}</small> || <small class="text-muted">Last updated {{$article->updated_at->format('D-M-Y') }}</small>
</p>
    
  </div>
</div>
@endforeach
 


  
      
         
        
</div>
</div>

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


  @endsection
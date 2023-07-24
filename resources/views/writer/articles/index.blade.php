@extends('writer.layouts.master')
@section('title','Writer | Articles')
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

  
    <section class="content">
    <div class="row">
    <div class="col-12">
      <div class="card">
                     
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body table-responsive p-0"> 
                    <table id="datatable" class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                        <th>SL</th>
                          <th>Title</th>
                          <th>Article</th>
                          <th>Image</th>
                          <th>Your Article Price</th>
                          <th>Price in Currency</th>
                          <th>Pulish Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $i=1; ?>
                        @foreach($articles as $article)
                        <tr>
                        <td>{{$i++}}</td>
                          <td>{{$article->title}}</td>
                          <td>{{Str::limit($article->article,30)}}</td>
                          <td><img style="width:50px;height:20px" src="{{asset('assets/img/'.$article->image )}}" alt=""></td>
                          <td>{{$article->articleprice}}</td>
                          <td>{{$article->currency}}</td>
                          <td>{{$article->updated_at->format('D-M-Y') }}</td>
                          <td>
                            <form action="{{ route('delete.article',$article->id) }}" method="Post">
                                <a class="btn btn-info"  href="{{ route('edit.article',$article->id) }}">Edit</a>
                                @csrf
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
</div>
</div>
</div>
</div>
</section>

</div>

@endsection
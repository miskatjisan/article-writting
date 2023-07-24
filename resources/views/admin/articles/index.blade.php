@extends('admin.layouts.master')
@section('title','Admin | Articles')
@section('content')      
      
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>


                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                  
                    
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                        <th>SL</th>
                          <th>User Id</th>
                          <th>Publisher</th>
                          <th>Title</th>
                          <th>Article</th>
                          <th>Image</th>
                          <th>Pulish Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $i=1; ?>
                        @foreach($articles as $article)
                        <tr>
                        <td>{{$i++}}</td>
                          <td>{{$article->userid}}</td>
                          <td>{{$article->username}}</td>
                          <td>{{$article->title}}</td>
                          <td>{{Str::limit($article->article,50)}}</td>
                          <td><img style="width:50px;height:20px" src="{{asset('assets/img/'.$article->image )}}" alt=""></td>
                          <td>{{$article->updated_at->format('D-M-Y') }}</td>
                         
                          <td>
                            <form action="{{ route('articles.destroy',$article->id) }}" method="Post">
                                <a class="btn btn-info"  href="{{ route('articles.show',$article->id) }}">View</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {!! $articles->links() !!}
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>



              <!--  -->

              </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection
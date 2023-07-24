@extends('admin.layouts.master')
@section('title','Admin | Withdrows')
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
                          <th>Writer Id</th>
                          <th>Publisher</th>
                          <th>Writer Email</th>
                          <th>Writer Phone</th>
                          <th>Withdrow</th>
                          <th>Type of Currency</th>
                          <th>Pulish Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $i=1; ?>
                        @foreach($withdrows as $withdrow)
                        <tr>
                        <td>{{$i++}}</td>
                          <td>{{$withdrow->userid}}</td>
                          <td>{{$withdrow->username}}</td>
                          <td>{{$withdrow->email}}</td>
                          <td>{{$withdrow->phone}}</td>
                          <td>{{$withdrow->withdrow}}</td>
                          <td>{{$withdrow->currency}}</td>
                          <td>{{$withdrow->updated_at->format('D-M-Y') }}</td>
                         
                          <td>
                            <form action="{{ route('withdrows.destroy',$withdrow->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Remove Request</button>
                            </form>
                        </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {!! $withdrows->links() !!}
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>



         

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
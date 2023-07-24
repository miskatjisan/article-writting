@extends('writer.layouts.master')
@section('title','Writer | Withdrow')
@section('content')      
      
       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Make Your Withdrow</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Make</a></li>
              <li class="breadcrumb-item active">Withdrow</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  
    <section class="content">

    <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
        <form class="form-horizontal" action="{{route('withdrow.make')}}" method="POST">
        @csrf

        <div class="form-group row">
          <input type="hidden" class="form-control" name="userid" value="{{$data->id}}">
          <input type="hidden" class="form-control" name="username" value="{{$data->username}}">
          <input type="hidden" class="form-control" name="email" value="{{$data->email}}">
          <input type="hidden" class="form-control" name="phone" value="{{$data->phone}}">
          <input type="hidden" class="form-control" name="currency" value="{{$setting->currency}}">
        </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Enter Withdrow Amount</label>
            <div class="col-sm-10">
              <input type="number" min=1 class="form-control"  placeholder="Type the amount less than your blance" name="withdrow">
            </div>
          </div>

          <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info">Make Withdrow</button>
                        </div>
                      </div>
</form>
</div>
</div>
</div>



    <div class="col-12 mt-5">
      <div class="card">
                     
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

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
                          <th>Your name</th>
                          <th>Your Email</th>
                          <th>Your Phone</th>
                          <th>Your Withdrow Balance</th>
                          <th>Type of Currency</th>
                          <th>Pulish Date</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $i=1; ?>
                        @foreach($withdrows as $withdrow)
                        <tr>
                        <td>{{$i++}}</td>
                          <td>{{$withdrow->username}}</td>
                          <td>{{$withdrow->email}}</td>
                          <td>{{$withdrow->phone}}</td>
                          <td>{{$withdrow->withdrow}}</td>
                          <td>{{$withdrow->currency}}</td>
                          <td>{{$withdrow->updated_at->format('D-M-Y') }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
</div>
</div>

</div>
</section>

</div>

@endsection
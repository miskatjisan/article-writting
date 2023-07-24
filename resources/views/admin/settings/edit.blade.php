@extends('admin.layouts.master')
@section('title','Settings | Change')
@section('content') 
<div class="right_col" role="main">
	<div class="">

<div class="page-title">
    <div class="title_left">
        <h3>Change Setting</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
          <a class="btn btn-info" href="{{route('settings.index')}}">Back</a>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Settings <small>Change Settings</small></h2>
                   
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="{{route('settings.update',$setting->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="articleprice">Per Article Price <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="articleprice" name="articleprice" required="required" class="form-control" value="{{$setting->articleprice}}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="currency">Currency Type<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="currency" name="currency" required="required" class="form-control" value="{{$setting->currency}}">
                            </div>
                        </div>
                      
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Change Setting</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    

</div>
</div>

@endsection

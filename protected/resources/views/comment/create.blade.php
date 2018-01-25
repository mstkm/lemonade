@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
    <h3>
    <!-- <a href="{{url('admin/event/create')}}" class="btn btn-primary">Add</a> -->
    </h3>     	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- BUTTONS -->
							<div class="panel">    
  
    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <div class="panel-heading">
									<h3 class="panel-title">Tambah Event</h3>
								</div>
              <form class="form-horizontal" method="POST" action="{{ url('admin/comment/store/'.$id) }}">
                        {{ csrf_field() }}
       
                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Rating</label>

                            <div class="col-md-1">
                                <input type="radio"  name="rate"  value='1'><span class="glyphicon glyphicon-star "></span>
                                </div>
                                <div class="col-md-1">
                                <input  type="radio"  name="rate" value='2'><span class="glyphicon glyphicon-star "></span>
                                </div>
                                <div class="col-md-1">
                                <input  type="radio"  name="rate" value='3' ><span class="glyphicon glyphicon-star "></span>
                                </div>
                                <div class="col-md-1">
                                <input  type="radio"  name="rate" value='4' ><span class="glyphicon glyphicon-star "></span>
                                </div>
                                <div class="col-md-1">
                                <input  type="radio"  name="rate" value='5' checked><span class="glyphicon glyphicon-star "></span>
                                </div>

                                                        </div>

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-4 control-label">Comment</label>

                            <div class="col-md-6">
                            <textarea class="form-control" name="comment" placeholder="textarea" rows="4"></textarea>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                        </form>
          </div>
        </div>
    </div>
    </div>
@endsection
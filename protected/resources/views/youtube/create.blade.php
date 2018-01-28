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
                                        <h3 class="panel-title">Tambah Video</h3>
                                    </div>
                <form class="form-horizontal" method="POST" action="{{ url('admin/youtube/store') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link" class="col-md-4 control-label">Youtube url 1</label>

                        <div class="col-md-6">
                            <input id="link" type="text" class="form-control" name="link[]" value="{{ old('link') }}" placeholder="https://www.youtube.com/watch?v=q0asYCoXPxk"
                                required autofocus> @if ($errors->has('link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link" class="col-md-4 control-label">Youtube url 2</label>

                        <div class="col-md-6">
                            <input id="link" type="text" class="form-control" name="link[]" value="{{ old('link') }}" placeholder="https://www.youtube.com/watch?v=q0asYCoXPxk"
                                required autofocus> @if ($errors->has('link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link" class="col-md-4 control-label">Youtube url 3</label>

                        <div class="col-md-6">
                            <input id="link" type="text" class="form-control" name="link[]" value="{{ old('link') }}" placeholder="https://www.youtube.com/watch?v=q0asYCoXPxk"
                                required autofocus> @if ($errors->has('link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                            @endif
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
@extends('layouts.main')

@section('isi')
<div class="container">
    <div class="row">
    <h3>
    <!-- <a href="{{url('admin/event/create')}}" class="btn btn-primary">Add</a> -->
    </h3>         
  
    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Video</h3>
              <form class="form-horizontal" method="POST" action="{{ url('admin/youtube/store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Youtube url 1</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link[]" value="{{ old('link') }}" placeholder="https://www.youtube.com/watch?v=q0asYCoXPxk" required autofocus>

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Youtube url 2</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link[]" value="{{ old('link') }}" placeholder="https://www.youtube.com/watch?v=q0asYCoXPxk" required autofocus>

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Youtube url 3</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link[]" value="{{ old('link') }}" placeholder="https://www.youtube.com/watch?v=q0asYCoXPxk" required autofocus>

                                @if ($errors->has('link'))
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
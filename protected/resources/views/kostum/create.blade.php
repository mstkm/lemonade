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
                                        <h3 class="panel-title">Tambah Kostum</h3>
                                    </div>
              <form class="form-horizontal" method="POST" action="{{ url('admin/kostum/store') }}">
                        {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Kostum</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}" required autofocus>

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}" required autofocus>

                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
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
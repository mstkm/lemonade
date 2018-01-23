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
              <form class="form-horizontal" method="POST" action="{{ url('admin/event/update',$event->id) }}">
                        {{ csrf_field() }}
                

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Event</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $event->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="status" value="{{ $event->status }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $event->alamat }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gedung') ? ' has-error' : '' }}">
                            <label for="gedung" class="col-md-4 control-label">Gedung</label>

                            <div class="col-md-6">
                                <input id="gedung" type="text" class="form-control" name="gedung" value="{{ $event->gedung->name }}" required autofocus>

                                @if ($errors->has('gedung'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gedung') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('startevent') ? ' has-error' : '' }}">
                            <label for="startevent" class="col-md-4 control-label">Mulai</label>

                            <div class="col-md-6">
                                <input id="startevent" type="text" class="form-control" name="startevent" value="<?php echo date('y-m-d H:i', strtotime($event->startevent)) ?>" required autofocus>

                                @if ($errors->has('startevent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('startevent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endevent') ? ' has-error' : '' }}">
                            <label for="endevent" class="col-md-4 control-label">Berakhir</label>

                            <div class="col-md-6">
                            <input id="endevent" type="text" class="form-control" name="endevent" value="<?php echo date('y-m-d H:i', strtotime($event->endevent)) ?>" required autofocus>
                            

                                @if ($errors->has('endevent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endevent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ $event->keterangan }}" required autofocus>

                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> 
    <script type="text/javascript">

    $('timepicker').datetimepicker({

        format: 'DD-MM-YYYY HH:mm'

    }); 



</script> 
                        
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection

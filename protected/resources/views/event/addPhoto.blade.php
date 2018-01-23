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
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif   
  
    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <div class="panel-heading">
									<h3 class="panel-title">Tambah Photo Event {{$event->name}}</h3>
								</div>
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('admin/event/'.$event->id.'/store/photo') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <div class="row">
                           <div class="col-md-3 control-label">
                              <label></label>
                              </div>
                            <div class="col-sm-6">
                              <input type="file" id="inputgambar" name="gambar" class="validate" value="{{old('gambar')}}" required>
                               <script type="text/javascript">
                                                       function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();
                    
                                                                reader.onload = function (e) {
                                                                    $('#showgambar').attr('src', e.target.result);
                                                                }
                    
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                    
                                                        $("#inputgambar").change(function () {
                                                            readURL(this);
                                                        });
                                                        </script>
                            </div>
                            <br/>
                            
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
        </div>
    </div>
    </div>
        </div>
    </div>
</div>
@endsection
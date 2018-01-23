@extends('layouts.main')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- <h3 class="page-title">Tables</h3> -->
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
                                <h3 class="panel-title">Daftar Video</h3>
                                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
    <h3>
    @if(auth::user()->jenis=='admin')
    <a href="{{url('admin/paket/create')}}" class="btn btn-primary">Add</a>
    @endif
    </h3> 
								</div>
           
              <table id="example1" class="table table-striped table-hover">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Url</th>

                  <th>Gambar</th>
                  <th>Tgl Upload</th>

                  <th>Opsi</th>
                      </tr>
              </thead>
              <tbody>
             <?php $x=0;?>
              @foreach($yutub as $event)
              <?php $x++?>
                  <tr>
                                <td>
                                <?php echo $x; ?>
                                </td>
                                <td>{{$event->title}}</td>
                                <td><a href="{{$event->url}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a> </td>
                                <td> <img src="{{$event->image}}" alt="" class="rounded" width="60"></td>
                                <td>{{$event->created_at}}</td>

                                <td>
                                   
                                    <a href="{{url('admin/event/edit/'.$event->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a> 
                                    <a href="{{url('admin/event/delete/'.$event->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> 


                                </td>
                  </tr>
              @endforeach
              
              </tbody>
          </table>

            </form>
          </div>
          <!-- /.box -->
          <script type="text/javascript">
        $(document).ready(function() {
            $('#example1').dataTable();
    </script>

        </div>
    </div>
</div>
@endsection
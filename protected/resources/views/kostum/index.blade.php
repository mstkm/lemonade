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
                                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
    <h3>
    @if(auth::user()->jenis=='admin')
    <a href="{{url('admin/kostum/create')}}" class="btn btn-primary">Add</a>
    @endif
    </h3> 
								</div>
              <table id="example1" class="table table-striped table-hover">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Foto</th>

                  <th>Keterangan</th>
                  @if(auth::user()->jenis=='admin')
                  <th>Opsi</th>
                  @endif
                      </tr>
              </thead>
              <tbody>
             <?php $x=0;?>
              @foreach($kostums as $kostum)
              <?php $x++?>
                  <tr>
                                <td>
                                <?php echo $x; ?>
                                </td>
                                <td>{{$kostum->name}}</td>
                                <td>{{$kostum->foto}}</td>
                                <td>{{$kostum->keterangan}}</td>
                                @if(auth::user()->jenis=='admin')
                                <td>
                                   
                                    <a href="{{url('admin/kostum/edit/'.$kostum->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a> 
                                    <a href="{{url('admin/kostum/delete/'.$kostum->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> 


                                </td>
                                @endif
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
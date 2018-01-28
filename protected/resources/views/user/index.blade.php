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
                                <h3 class="panel-title">Daftar User</h3>
                                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
    <h3>
    <a href="{{url('admin/user/create')}}" class="btn btn-primary">Add</a>
    </h3> 
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
                                            <th>No</th>
                                            <th>Nama</th>      
                                            <th>Jenis User</th>
                                            <th>Email</th>                          
                                            <th>alamat</th>
                                            <th>Phone</th>
                                            <th>Opsi</th>
											</tr>
										</thead>
										<tbody>
                                        <?php $x = 0; ?>
                                        @foreach($user as $item)
                                        <?php $x++ ?>
                                            <tr>
                                                          <td>
                                                          <?php echo $x; ?>
                                                          </td>
                                                  
                                                          <td>{{$item->name}}</td>
                                                          <td>{{$item->jenis}}</td>
                                                          <td>{{$item->email}}</td>
                                                          <td>{{$item->alamat}}</td>
                                                          <td>{{$item->noHP}}</td>                                                                                                           
                                                          <td>
                                                            <a href="{{url('admin/user/edit/'.$item->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a> 
                                                            <a href="{{url('admin/user/delete/'.$item->id)}}" onClick="return confirm('Anda Yakin??')" class="btn btn-danger" onClick="return confirm('Yakin hapus pesanan item ini?')" ><span class="glyphicon glyphicon-remove"></span></a>                        
                          
                                                          </td>
                                            </tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
                            </div>
                            </div>
                            </div>
                            </div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
@endsection
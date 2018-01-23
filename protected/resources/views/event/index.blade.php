

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
                                <h3 class="panel-title">Daftar Event</h3>
                                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
    <h3>
    <a href="{{url('admin/event/create')}}" class="btn btn-primary">Add</a>
    </h3> 
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>      
                                            <th>Jenis Pemesan</th>
                                            <th>Nama Acara</th>                          
                                            <!-- <th>Status</th> -->
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Keterangan</th>
                                            <th>Paket</th>
                                            <th>Kostum</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
											</tr>
										</thead>
										<tbody>
                                        <?php $x = 0; ?>
                                        @foreach($events as $event)
                                        <?php $x++ ?>
                                            <tr>
                                                          <td>
                                                          <?php echo $x; ?>
                                                          </td>
                                                          <td>{{$event->User->name}}</td>
                                                          <td>{{$event->User->jenis}}</td>
                                                          <td>{{$event->name}}</td>
                                                          <!-- <td>{{$event->status}}</td> -->
                                                          <td>{{$event->startevent}}</td>
                                                          <td>{{$event->endevent}}</td>
                                                          <td>{{$event->keterangan}}</td>
                                                          <td>{{$event->Paket->name}}</td>
                                                          <td>{{$event->Kostum->name}}</td>
                                                          <td> 
                                                            @if($event->status == "review")
                                                              <a href="{{url('terima/'.$event->id)}}" class="btn btn-info" onClick="return confirm('Anda Yakin?')">Terima</a>
                                                              <a href="{{url('tolak/'.$event->id)}}" class="btn btn-danger" onClick="return confirm('Anda Yakin?')">Tolak</a>
                                                            @elseif($event->status == "dp")
                                                              <a href="{{url('complete/'.$event->id)}}" class="btn btn-success" onClick="return confirm('Anda Yakin?')">Booked</a> 
                                                              @elseif($event->status == "complete")
                                                              <a href="" class="btn btn-success disabled" onClick="return confirm('Anda Yakin?')">Complete</a> 
                                                              @elseif($event->status == "canceled")
                                                              <a href="" class="btn btn-danger disabled" onClick="return confirm('Anda Yakin?')">Canceled</a> 
                                                              @endif</td>
                                                          <td>
                                                            <a href="{{url('admin/event/view    /'.$event->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a> 
                                                            <a href="{{url('admin/event/edit/'.$event->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a> 
                                                            <a href="{{url('admin/event/delete/'.$event->id)}}" class="btn btn-danger" onClick="return confirm('Yakin hapus pesanan event ini?')" ><span class="glyphicon glyphicon-remove"></span></a> 
                          
                          
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
@extends('layouts.main')

@section('isi')
<div class="container">
    <div class="row">
    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
    <h3>
    <a href="{{url('admin/event/create')}}" class="btn btn-primary">Add</a>
    </h3>         
  

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Event</h3>
            </div>
           
              <table id="example1" class="table table-striped table-hover">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama Admin</th>
                  <th>Nama Acara</th>

                  <th>Status</th>
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
             <?php $x=0;?>
              @foreach($events as $event)
              <?php $x++?>
                  <tr>
                                <td>
                                <?php echo $x; ?>
                                </td>
                                <td>{{$event->User->name}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->status}}</td>
                                <td>{{$event->startevent}}</td>
                                <td>{{$event->endevent}}</td>
                                <td>{{$event->keterangan}}</td>
                                <td>{{$event->Paket->name}}</td>
                                <td>{{$event->Kostum->name}}</td>
                                <td> @if($event->status == "Book")
                                    <a href="{{url('dpevent/'.$event->id)}}">Tahap DP</a>
                                    @elseif($event->status == "DP")
                                    <a href="{{url('event/'.$event->id)}}">Book</a> 
                                    @endif</td>
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
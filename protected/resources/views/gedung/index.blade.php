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
    <a href="{{url('admin/gedung/create')}}" class="btn btn-primary">Add</a>
    </h3>         
  

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar gedung</h3>
            </div>
           
              <table id="example1" class="table table-striped table-hover">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama Admin</th>
                  <th>Nama Acara</th>
                  <th>Opsi</th>

            
                      </tr>
              </thead>
              <tbody>
             <?php $x=0;?>
              @foreach($gedungs as $gedung)
              <?php $x++?>
                  <tr>
                                <td>
                                <?php echo $x; ?>
                                </td>
                                <td>{{$gedung->name}}</td>
                                <td>{{$gedung->alamat}}</td>
                                <td>{{$gedung->keterangan}}</td>
                           <td>
                                   
                                    <a href="{{url('admin/gedung/edit/'.$gedung->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a> 
                                    <a href="{{url('admin/gedung/delete/'.$gedung->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> 


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
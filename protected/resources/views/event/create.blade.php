@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h3>
            <!-- <a href="{{url('admin/event/create')}}" class="btn btn-primary">Add</a> -->
        </h3>
        <div class="main">
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
                                        <form class="form-horizontal" method="POST" action="{{ url('admin/event/store') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Nama Event</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>                                                    @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                                                </div>
                                            </div>
                                            @if(auth::user()->jenis=='admin')
                                            <div class="form-group">
                                                <label for="admin" class="col-md-4 control-label">Status</label>
                                                <div class="col-md-6">
                                                    <select id="status" name="status" class="form-control" required>
                                        <option value="" disabled selected>------------Pilih Status----------------</option>
                                        <option value="Book" >Book (Lunas)</option>
                                        <option value="DP" >Tahap DP</option>
                                </select>
                                                </div>
                                            </div>
                                            @else
                                            <input type="hidden" name="status" value="DP"> @endif
                                            <div class="form-group">
                                                <label for="admin" class="col-md-4 control-label">Gedung</label>
                                                <div class="col-md-6">
                                                    <select id="gedung_id" name="gedung_id" class="form-control" required>
                                        <option value="" disabled selected>------------Pilih Gedung----------------</option>
                                        @foreach($gedung as $item)
                                        <option value="{{$item->id}}" > {{$item->name}}</option>
                                        @endforeach
                                        <option value="other" > Gedung Tidak Terdaftar</option>
                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('gedung') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Nama Gedung</label>
                                                <div class="col-md-6">
                                                    <input id="gedung" type="text" class="form-control" name="gedung" value="{{ old('gedung') }}" required>                                                    @if ($errors->has('gedung'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('gedung') }}</strong>
                                    </span> @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Alamat</label>
                                                <div class="col-md-6">
                                                    <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>                                                    @if ($errors->has('alamat'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span> @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                                <label for="date" class="col-md-4 control-label">Tanggal</label>
                                                <div class="col-md-6">
                                                    <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" required autofocus>                                                    @if ($errors->has('date'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span> @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('startevent') ? ' has-error' : '' }}">
                                                <label for="startevent" class="col-md-4 control-label">Jam</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control time" name="startevent" value="{{ old('startevent') }}" required autofocus>                                                    @if ($errors->has('startevent'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('startevent') }}</strong>
                                </span> @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control time" name="endevent" value="{{ old('endevent') }}" required autofocus>                                                    @if ($errors->has('endevent'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('endevent') }}</strong>
                                    </span> @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                                <label for="keterangan" class="col-md-4 control-label">Keterangan</label>
                                                <div class="col-md-6">
                                                    <input id="keterangan" type="text" class="form-control " name="keterangan" value="{{ old('keterangan') }}" required autofocus>                                                    @if ($errors->has('keterangan'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="admin" class="col-md-4 control-label">Paket</label>
                                                <div class="col-md-6">
                                                    <select id="paket_id" name="paket_id" class="form-control" required>
                                        <option value="" disabled selected>------------Pilih Paket----------------</option>
                                        @foreach($paket as $item)
                                        <option value="{{$item->id}}" >{{$item->name}}</option>
                                        @endforeach
                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="admin" class="col-md-4 control-label">Kostum</label>
                                                <div class="col-md-6">
                                                    <select id="kostum_id" name="kostum_id" class="form-control" required>
                                        <option value="" disabled selected>------------Pilih Kostum----------------</option>
                                        @foreach($kostum as $item)
                                        <option value="{{$item->id}}" >{{$item->name}}</option>
                                        @endforeach
                                </select>
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
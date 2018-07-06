@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Member
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Member</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $p->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">NIS/NIK</label>
						<input type="text" name="nis" class="form-control" value="{{ $p->nis }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Jurusan/Mata p</label>
						<input type="text" name="jurusan" class="form-control" value="{{ $p->jurusan }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">No Telepon</label>
						<input type="text" name="no_hp" class="form-control" value="{{ $p->no_hp}}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">alamat</label>
						<input type="text" name="alamat" class="form-control" value="{{ $p->alamat}}"  readonly>
			  		</div>
			  			<div class="form-group" name="nama_barang">
                    <strong>Barang</strong><br>@foreach($ps as $data){{ $data->nama_barang }}, @endforeach

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection
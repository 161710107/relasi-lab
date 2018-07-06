@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Barang 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">nama_barang</label>	
			  			<input type="text" name="nama_barang" class="form-control" value="{{ $ps->nama_barang }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">persediaan</label>	
			  			<input type="text" name="persediaan" class="form-control" value="{{ $ps->persediaan }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">kondisi</label>	
			  			<input type="text" name="sisa_bakondisiyar" class="form-control" value="{{ $ps->sisa_bayar }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection
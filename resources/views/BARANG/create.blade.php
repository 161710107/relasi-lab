@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Barang
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('barang.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
			  			<label class="control-label">nama_barang</label>	
			  			<input type="text" name="nama_barang" class="form-control"  required>
			  			@if ($errors->has('nama_barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('persediaan') ? ' has-error' : '' }}">
			  			<label class="control-label">persediaan</label>	
			  			<input type="text" name="persediaan" class="form-control"  required>
			  			@if ($errors->has('persediaan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('persediaan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kondisi') ? ' has-error' : '' }}">
			  			<label class="control-label">kondisi</label>	
			  			<input type="text" name="kondisi" class="form-control"  required>
			  			@if ($errors->has('kondisi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kondisi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
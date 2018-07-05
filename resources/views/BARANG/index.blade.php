@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-2">
	<!--nav-->
				@include('layouts.dashboard')
			<!--end nav-->
	</div>
	<div class="col-md-10">
			<div class="panel panel-danger">
			  <div class="panel-heading"><font color ="blue">Data Pesanan</font>
			  	<div class="panel-title pull-right"><a href="{{ route('pesanan.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th><font color="magenta"><b>No</b></th></font>
					  <th><font color="magenta"><b>Total Pesanan</b></th></font>
					  <th><font color="magenta"><b>Uang Muka</b></th></font>
					  <th><font color="magenta"><b>Sisa Bayar</b></th></font>
					  <th><font color="magenta"><b>Tanggal Pesan</b></th></font>
					  <th colspan="2"><font color="magenta"><b>Action</b></th></font>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($ps as $data)
				  	  <tr>
				    	<td><font color="blue"><b>{{ $no++ }}</b></td></font>
				    	<td><font color="blue"><b>{{ $data->total_pesanan }}</b></td></font>
				    	<td><font color="blue"><b>Rp.{{ $data->uang_muka }}</b></td></font>
				    	<td><font color="blue"><b>Rp.{{ $data->sisa_bayar }}</b></td></font>
				    	<td><font color="blue"><b>{{ $data->tanggal_pesan }}</b></td></font>
						<td>
							<a class="btn btn-warning" href="{{ route('pesanan.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('pesanan.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('pesanan.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
							</form>
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
@endsection
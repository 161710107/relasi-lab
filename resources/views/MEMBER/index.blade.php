@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			  <div class="panel-heading"><font color ="blue">DATA MEMBER</font>
			  </div>
			  	<div class="panel-title pull-right"><a href="{{ route('member.create') }}">Tambah Data</a>
			  	</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th><font color="magenta"><b>No</b></th></font>
					  <th><font color="magenta"><b>Nama</b></th></font>
					  <th><font color="magenta"><b>NIS/NIK</b></th></font>
					  <th><font color="magenta"><b>Jurusan</b></th></font>
					  <th><font color="magenta"><b>No Telepon</b></th></font>
					  <th><font color="magenta"><b>Alamat</b></th></font>
					  <th colspan="3"><font color="magenta"><b>Action</b></th></font>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($p as $data)
				  	  <tr>
				    	<td><font color="blue"><b>{{ $no++ }}</b></td></font>
				    	<td><font color="blue"><b>{{ $data->nama }}</b></td></font>
				    	<td><p><font color="blue"><b>{{ $data->nis }}</b></p></td></font>
				    	<td><p><font color="blue"><b>{{ $data->jurusan }}</b></p></td></font>
				    	<td><p><font color="blue"><b>+{{ $data->no_hp }}</b></p></td></font>
				    	<td><p><font color="blue"><b>{{ $data->alamat }}</b></p></td></font>
						<td>
							<a class="btn btn-warning" href="{{ route('member.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('member.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('member.destroy',$data->id) }}">
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
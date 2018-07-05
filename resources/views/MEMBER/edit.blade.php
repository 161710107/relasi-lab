@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Member
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('MEMBER.update',$p->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama /label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $p->nama }}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nis') ? ' has-error' : '' }}">
			  			<label class="control-label">NIS/NIK</label>	
			  			<input type="text" value="{{ $p->nis }}" name="nis" class="form-control"  required>
			  			@if ($errors->has('nis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nis') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jurusan') ? ' has-error' : '' }}">
			  			<label class="control-label">Jurusan/Mata</label>	
			  			<input type="date" value="{{ $p->jurusan }}" name="jurusan" class="form-control"  required>
			  			@if ($errors->has('jurusan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jurusan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('no_telepon') ? ' has-error' : '' }}">
			  			<label class="control-label">No Telepon</label>	
			  			<input type="text" value="{{ $p->no_telepon }}" name="no_telepon" class="form-control"  required>
			  			@if ($errors->has('no_telepon'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_telepon') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('id_organizer') ? ' has-error' : '' }}">
			  			<label class="control-label">Organizer</label>	
			  			<select name="id_organizer" class="form-control">
			  				@foreach($o as $data)
			  				<option value="{{ $data->id }}" {{ $selectedo == $data->id ? 'selected="selected"' : '' }} >{{ $data->email }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_organizer'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_organizer') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('pesanan') ? ' has-error' : '' }}">
			  			<label class="control-label">Pesanan</label>	
			  			<select name="pesanan[]" class="form-control js-example-basic-multiple" multiple="multiple">
			  				@foreach($ps as $data)
			  				<option value="{{ $data->id }}"{{ (in_array($data->id, $selected)) ? ' selected="selected"' : '' }}>{{ $data->total_pesanan }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('pesanan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pesanan') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
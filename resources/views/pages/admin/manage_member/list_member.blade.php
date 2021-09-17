@extends('layouts/main')

@section('title','Manage Member')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-info">Manage Member</h6>
		<!-- <a href="/admin/list_member/pdf" class="d-none ml-auto d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> PDF</a>&nbsp; -->
		<a href="/admin/list_member/tambah_member" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Member</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Member</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Telp.</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach($member as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->nama_member}}</td>
						<td>{{$data->jenis_kelamin}}</td>
						<td>{{$data->alamat_member}}</td>
						<td>{{$data->tlp_member}}</td>
						<td>
							<a class="text-light" href="/admin/list_member/edit_member/{{ $data->id_member }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a>
							<a class="text-light hapus" href="#" acc-id="{{$data->id_member}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection


@section('js')

<script type="text/javascript">

	$('.hapus').on('click',function(){
		var id = $(this).attr('acc-id')
		console.log(id)
		var url = '{{URL::to('admin/list_member/hapus_member')}}/' +id

		Swal.fire({
			title: 'Apakah Anda Yakin?',
			text: "Data yang telah dihapus tidak dapat dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = url;
				
			}
		})
	});
</script>

@endsection
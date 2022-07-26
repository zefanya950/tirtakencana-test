@extends('layout')
@section('title')
Table D
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Table D</h3>
                        </div>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-primary" data-bs-target="#add_new_data" data-bs-toggle="modal"
                            >Add New Data</button>
                        <button class="btn btn-sm btn-success" data-bs-target="#import_data" data-bs-toggle="modal"
                            >Import Data</button>
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="dropdownExport"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownExport">
                                <div class="dropdown-item">
                                    <a href="{{ route('exportD.excel') }}" class="btn btn-sm btn-info">Excel</a>
                                </div>
                                <div class="dropdown-item">
                                    <a href="{{ route('exportD.pdf') }}" class="btn btn-sm btn-warning">PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Kode Sales</th>
                                <th scope="col" class="text-center">Nama Sales</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @if(count($data) > 0)
                                @foreach ($data as $item)
                                    <tr>
                                        <td scope="row" class="text-center">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $item->kode_sales }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item->nama_sales }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-success" data-bs-target="#edit_data"
                                                data-bs-toggle="modal"
                                                onclick="showModal('{{ $item->kode_sales }}', '{{ $item->nama_sales }}')">Edit</button>
                                            <form method="POST"
                                                action="{{  route('table_d.delete',['id' => $item->kode_sales]) }}">
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit"
                                                    onclick="if(!confirm('Are you sure want to delete this data? You can\'t undo this action.')) return false;">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <th colspan="3">Tidak ada data.</th>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="add_new_data" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="master_jenis_berkas_form" action="{{ route('table_d.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-sm-4 d-flex align-items-center">
                                <label>Kode Sales </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_sales" >
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-sm-4 d-flex align-items-center">
                                <label>Nama Sales </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_sales" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit_data" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="master_jenis_berkas_form" action="{{ route('table_d.update_nama_sales') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-sm-4 d-flex align-items-center">
                                <label>Kode Sales </label>
                            </div>
                            <div class="col-sm-8">
                                <input readonly id="kode_sales" type="text" class="form-control" name="kode_sales" >
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-sm-4 d-flex align-items-center">
                                <label>Nama Sales</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="nama_sales" type="text" class="form-control" name="nama_sales" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="import_data" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data" action="{{ route('importD.excel') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Import Data </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-sm-4 d-flex align-items-center">
                                <label>Masukkan File Excel (.xlsx) <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" name="file" class="form-control" accept=".xlsx" required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-sm-4 d-flex align-items-center"></div>
                            <div class="col-sm-8">
                                <label class="form-control-label text-danger mt-2">*Format: xlsx</label><br>
                                <label class="form-control-label text-danger">*Klik di <a href="{{ asset('TableAExample.xlsx') }}" class="text-info" target="_blank" download>sini</a> untuk melihat contoh file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">

function showModal(kode_sales, nama_sales) {
    document.getElementById("kode_sales").value = kode_sales;
    document.getElementById("nama_sales").value = nama_sales ?? '';
}
</script>
@endsection
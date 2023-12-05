@extends('layouts.admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        <a href="/siswaExport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <div class="row">
        {{-- content --}}
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 g-3 row">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#siswa"
                        @style('font-size: 15px;')>
                        tambah data siswa
                    </button>
                    <h6 class="m-3  font-weight-bold text-primary">Table Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>no Handphone</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($siswa as $murid)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $murid->nis }}</td>
                                        <td>{{ $murid->nama }}</td>
                                        <td>{{ $murid->kelas->nama_kelas }}</td>
                                        <td>{{ $murid->no_telp }}</td>
                                        <td>{{ $murid->alamat }}</td>
                                        <td class="d-flex g-5">
                                            <a href="{{ route('data-siswa.edit', $murid->nisn) }}" class="btn btn-warning"
                                                @style('font-size: 15px;')>
                                                Edit
                                            </a>
                                            <form action="{{ route('data-siswa.destroy', $murid->nisn) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/data-siswa-tambah" method="POST" @style('color: #000')>
                            @csrf
                            <div class="modal-body">
                                {{-- bagian form untuk tambah siswa --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label  ">Masukan Nisn</label>
                                    <input type="text" name="nisn" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan Nis</label>
                                    <input type="text" name="nis" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan Kelas</label>
                                    <select name="kelas" class="custom-select"
                                        {{ count($kelas) == 0 ? 'disabled' : '' }}id="">
                                        @if (count($kelas) == 0)
                                            <option value="">pilihan tidak ada</option>
                                        @else
                                            @foreach ($kelas as $kls)
                                                <option value="{{ $kls->id_kelas }}">{{ $kls->nama_kelas }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan No Handphone</label>
                                    <input type="text" name="no_telp" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">SPP</label>
                                    <select name="spp" id="" class="custom-select">
                                        @if (count($spp) == 0)
                                            <option value="">pilihan tidak ada</option>
                                        @else
                                            @foreach ($spp as $spp_id)
                                                <option value="{{ $spp_id->id_spp }}">
                                                    {{ 'Tahun ' . $spp_id->tahun . ' - ' . 'Rp. ' . number_format($spp_id->nominal) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                {{-- end form tambah siswa --}}
                            </div>
                            <div class="modal-footer">
                                <button type="submit " class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- modal edit data --}}
        </div>
    </div>
    @include('includes.script')
@endsection

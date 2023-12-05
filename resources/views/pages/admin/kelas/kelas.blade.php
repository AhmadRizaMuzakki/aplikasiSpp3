@extends('layouts.admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
        <a href="/kelasExport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                        tambah data kelas
                    </button>
                    <h6 class="m-3  font-weight-bold text-primary">Table KELAS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama kelas</th>
                                    <th>Kompetensi_keahlian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                              @php
                                  $i = 1
                              @endphp
                                @foreach ($kelas as $murid)
                                    <tr>
                                        <td>{{ $i++  }}</td>
                                        <td>{{ $murid->nama_kelas }}</td>
                                        <td>{{ $murid->kopetensi_keahlian }}</td>
                                        <td class="d-flex">
                                          <a href="{{ route('data-kelas.edit', $murid->id_kelas) }}" class="btn btn-warning g-5"
                                              @style('font-size: 15px;')>
                                              Edit
                                          </a>
                                          <form action="{{ route('data-kelas.destroy', $murid->id_kelas) }}" method="post" >
                                            @csrf
                                            @method('delete')
                                            <button type="submit"  class="btn btn-danger">Delete</button>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah SPP</h1>
                            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- bagian form untuk tambah siswa --}}
                            <form action="/data-kelas-tambah" method="POST" @style('color: #000')>
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label  ">Masukan Nama Kelas</label>
                                    <input type="text" name="kelas" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label ">Masukan Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control" id="exampleInputPassword1">
                                </div>
                                {{-- end form tambah siswa --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('includes.script')
@endsection

@extends('layouts.admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data SPP</h1>
        <a href="/sppExport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <div class="row">
        {{-- content --}}
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Nominal</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($spp as $murid)
                                    <tr>
                                        <td>{{ $i = 1 }}</td>
                                        <td>{{ $murid->nis }}</td>
                                        <td>{{ $murid->nama }}</td>
                                        <td>{{ $murid->kelas->nama_kelas }}</td>
                                        <td>{{ $murid->spp->nominal }}</td>
                                        <td>{{ $murid->spp->tahun }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('data-spp.edit', $murid->nisn) }}" class="btn btn-warning"
                                                @style('font-size: 15px;')>
                                                Edit
                                            </a>
                                            <form action="{{ route('data-spp.destroy', $murid->id_spp) }}" method="post">
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


        </div>
    </div>
    @include('includes.script')
@endsection

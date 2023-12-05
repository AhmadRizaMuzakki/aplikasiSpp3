@extends('layouts.admin')

@section('content')
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
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
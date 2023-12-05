@extends('layouts.admin')

@section('content')

    <div class="row">
        {{-- content --}}
        <div class="container-fluid">
            <form action="{{ route('data-kelas.update', $kelas->id_kelas) }}" method="POST" @style('color: #000')>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- bagian form untuk tambah siswa --}}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  ">Masukan Nisn</label>
                        <input type="text" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan Nis</label>
                        <input type="text" name="kopetensi_keahlian" class="form-control" value="{{ $kelas->kopetensi_keahlian }}"
                            id="exampleInputPassword1">
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
    @include('includes.script')
@endsection

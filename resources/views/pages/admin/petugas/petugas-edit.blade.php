@extends('layouts.admin')

@section('content')
    <div class="row">
        {{-- content --}}
        <div class="container-fluid">
            <form action="{{ route('data-petugas.update', $petugas->id) }}" method="POST" @style('color: #000')>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- bagian form untuk tambah siswa --}}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  ">Masukan nama</label>
                        <input type="text" name="nisn" class="form-control" value="{{ $petugas->name }}"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan username</label>
                        <input type="text" name="nis" class="form-control" value="{{ $petugas->userame }}"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan level</label>
                        <input type="text" name="nis" class="form-control" value="{{ $petugas->level }}"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan email</label>
                        <input type="text" name="nis" class="form-control" value="{{ $petugas->email }}"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan password</label>
                        <input type="text" name="nis" class="form-control" value="{{ $petugas->password }}"
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

@extends('layouts.admin')

@section('content')

    <div class="row">
        {{-- content --}}
        <div class="container-fluid">
            <form action="{{ route('data-spp.update', $siswa->nisn) }}" method="POST" @style('color: #000')>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- bagian form untuk tambah siswa --}}
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan Nis</label>
                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">Masukan Kelas</label>
                        <select name="kelas" class="custom-select"
                            {{ count($kelas) == 0 ? 'disabled' : '' }}id="">
                            @if (count($kelas) == 0)
                                <option value="">pilihan tidak ada</option>
                            @else
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id_kelas }}" {{ $siswa->id_spp == $kls->id_kelas ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label ">SPP</label>
                        <select name="spp" id="" class="custom-select">
                            @if (count($spp) == 0)
                                <option value="">pilihan tidak ada</option>
                            @else
                                @foreach ($spp as $spp_id)
                                    <option value="{{ $spp_id->id_spp }}" {{ $siswa->id_spp == $kls->id_spp ? 'selected' : '' }}>
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
    @include('includes.script')
@endsection

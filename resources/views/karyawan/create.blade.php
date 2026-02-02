@extends('layouts.bootstrap5')
@section('konten')
    <div class="col-lg-6 mx-auto">
        <div class="card border-0">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi-person-plus"></i> Profil Karyawan
                </h4>
                <hr>
                <form action="{{ url('karyawan') }}" method="post">
                    @csrf
                    <x-input name="nama" type="text" label="Nama Karyawan" />
                    <livewire:nik-otomatis :emails="$emails"  />
                    <div class="mb-3">
                        <label  class="form-label">Jabatan</label>
                        <select name="jabatan_id" class="form-select">
                            <option selected disabled>--Pilih Jabatan--</option>
                            @foreach ($jabatan as $kol)
                                <option value="{{ $kol->id }}">{{ $kol->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <livewire:api-daerah />
                    <textarea name="alamat" class="form-control mb-3"  rows="5" placeholder="masukan alamat lengkap"></textarea>
                    <x-tombol-submit />
                </form>
            </div>
        </div>
    </div>
@endsection
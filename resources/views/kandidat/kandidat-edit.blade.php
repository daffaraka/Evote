@extends('layout')
@section('title', 'Edit Kandidat')
@section('content')

    <div class="container py-4">
        <form action="{{ route('kandidat.update',$kandidat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="">Gambar Kandidat Pasangan</label>
                <input type="file" class="form-control" name="foto_kandidat" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="">Pemilihan Yang Diikuti</label>
                <select type="text" name="pemilihan_id" class="form-control" required id="pemilihan_id">
                    <option>Pilih</option>
                    @foreach ($pemilihan as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_pemilihan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Nama Pasangan</label>
                <input type="text" name="nama_pasangan" class="form-control" required id="nama_pasangan" value="{{$kandidat->nama_pasangan}}">
            </div>
            <div class="mb-3">
                <label for="">Nama Ketua</label>
                <input type="text" name="nama_ketua" class="form-control" required id="nama_ketua" value="{{$kandidat->nama_ketua}}">
            </div>
            <div class="mb-3">
                <label for="">Nama Wakil</label>
                <input type="text" name="nama_wakil" class="form-control" required id="nama_wakil" value="{{$kandidat->nama_wakil}}">
            </div>
            <div class="mb-3">
                <label for="">Visi</label>
                <input type="text" name="visi" class="form-control" required id="visi" value="{{$kandidat->visi}}">
            </div>
            <div class="mb-3">
                <label for="">Misi</label>
                <input type="text" name="misi" class="form-control" id="misi" required value="{{$kandidat->misi}}">
            </div>
            <div class="mb-3">
                <label for="">Program Kerja</label>
                <input type="text" name="program_kerja" class="form-control" required id="program_kerja" value="{{$kandidat->program_kerja}}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>


    </div>


    </div>


@endsection
@include('partials.scripts')

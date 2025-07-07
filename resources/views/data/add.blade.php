@extends('layouts.app')

@section('title', 'Tambah Data')

@section('content')
  <h2>Form Tambah Data</h2>

  <form action="/create" method="POST">
    @csrf

    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id', $id ?? '') }}" readonly>
      @error('id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="pic" class="form-label">PIC</label>
      <input type="text" class="form-control @error('pic') is-invalid @enderror" id="pic" name="pic" value="{{ old('pic') }}" required>
      @error('pic')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="perusahaan" class="form-label">Perusahaan</label>
      <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" value="{{ old('perusahaan') }}" required>
      @error('perusahaan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-size">Simpan</button>
    <button type="reset" class="btn btn-danger btn-size" onclick="window.location.reload();">Reset</button>
    <a href="/" class="btn btn-dark btn-size">Kembali</a>
  </form>
@endsection
@extends('layouts.app')

@section('title', 'Edit Data')

@section('content')
  <h2>Edit Data</h2>

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form action="/update" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" value="{{ old('id', $data->id) }}" readonly>
      @error('id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="pic" class="form-label">PIC</label>
      <input type="text" class="form-control @error('pic') is-invalid @enderror" id="pic" name="pic" value="{{ old('pic', $data->pic) }}" required>
      @error('pic')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="perusahaan" class="form-label">Perusahaan</label>
      <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" value="{{ old('perusahaan', $data->perusahaan) }}" required>
      @error('perusahaan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-size">Update</button>
    <button type="reset" class="btn btn-danger btn-size" onclick="window.location.reload();">Reset</button>
    <a href="/" class="btn btn-dark btn-size">Kembali</a>
  </form>

@endsection
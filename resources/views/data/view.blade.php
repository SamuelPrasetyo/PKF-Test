@extends('layouts.app')

@section('title', 'View Data Page')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data</h2>
    <a href="/page_add" class="btn btn-primary btn-custom">+ Tambah Data</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th style="width: 50px;">No.</th>
        <th style="width: 75px;">ID</th>
        <th style="width: 200px;">PIC</th>
        <th style="width: 250px;">Perusahaan</th>
        <th style="width: 120px;">Created at</th>
        <th style="width: 120px;">Updated at</th>
        <th style="width: 150px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $index => $item)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $item->id }}</td>
          <td>{{ $item->pic }}</td>
          <td>{{ $item->perusahaan }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
          <td>
            <a href="/page_edit?id={{ $item->id }}" class="btn btn-sm btn-warning btn-table">Edit</a>
            <!-- Button Trigger Modal -->
            <button type="button" class="btn btn-sm btn-danger btn-table" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
              Hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                    <form action="/delete" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="id" value="{{ $item->id }}">
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Tidak ada data.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
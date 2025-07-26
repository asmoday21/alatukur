@extends('guru.guru_master')

@section('guru')
<!-- Material Design Icons -->
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">

<div class="container py-5">
  <!-- Judul dengan icon -->
  <h2 class="text-center mb-4 fw-bold text-gradient">
    <i class="mdi mdi-lightbulb-on-outline me-2"></i> Daftar Quiz Interaktif
  </h2>

  <!-- Alert Sukses -->
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
      <i class="mdi mdi-check-circle-outline me-2"></i> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <!-- Tombol Tambah Quiz -->
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('guru.quiz.create') }}" class="btn btn-primary fw-semibold shadow-sm rounded-pill px-4">
      <i class="mdi mdi-plus-circle-outline me-2"></i> Buat Quiz Baru
    </a>
  </div>

  <!-- Kartu Daftar Quiz -->
  <div class="card border-0 shadow rounded-4">
    <div class="card-body px-4 py-4">
      <div class="table-responsive">
        <table class="table table-hover align-middle text-nowrap">
          <thead class="table-primary text-center">
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 25%;"><i class="mdi mdi-format-title me-1"></i>Judul</th>
              <th style="width: 15%;"><i class="mdi mdi-application-outline me-1"></i>Platform</th>
              <th style="width: 30%;"><i class="mdi mdi-link-variant me-1"></i>Link</th>
              <th style="width: 15%;"><i class="mdi mdi-account-outline me-1"></i>Pembuat</th>
              <th style="width: 10%;"><i class="mdi mdi-cog-outline me-1"></i>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($quizzes as $index => $quiz)
              <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="fw-semibold">{{ $quiz->judul }}</td>
                <td class="text-center">
                  <span class="badge bg-light text-dark border rounded-pill px-3 py-1">
                    <i class="mdi mdi-web me-1"></i>{{ $quiz->platform }}
                  </span>
                </td>
                <td>
                  <a href="{{ $quiz->link }}" target="_blank" class="text-decoration-none text-primary fw-medium">
                    <i class="mdi mdi-open-in-new me-1"></i> {{ Str::limit($quiz->link, 40) }}
                  </a>
                </td>
                <td class="text-center text-muted">{{ $quiz->user->name ?? 'N/A' }}</td>
                <td class="text-center">
                  <a href="{{ route('guru.quiz.edit', $quiz->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 me-1" title="Edit">
                    <i class="mdi mdi-pencil-outline"></i>
                  </a>
                  <form action="{{ route('guru.quiz.destroy', $quiz->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus quiz ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" title="Hapus">
                      <i class="mdi mdi-delete-outline"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center py-5 text-muted">
                  <i class="mdi mdi-emoticon-sad-outline fs-4 d-block mb-2"></i>
                  Belum ada quiz yang tersedia.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

<style>
  .text-gradient {
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .table-primary th {
    background-color: #e7f1ff !important;
    color: #0d6efd;
    font-weight: 600;
  }

  .badge {
    font-size: 0.85rem;
  }
</style>

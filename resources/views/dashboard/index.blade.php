@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h1 class="mb-4">Dashboard Perpustakaan</h1>

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <h5>Total Buku</h5>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <h5>Buku Tersedia</h5>
                <h2>{{ $bukuTersedia }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <h5>Buku Habis</h5>
                <h2>{{ $bukuHabis }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-info">
            <div class="card-body">
                <h5>Total Anggota</h5>
                <h2>{{ $totalAnggota }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <h5>Anggota Aktif</h5>
                <h2>{{ $anggotaAktif }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-secondary">
            <div class="card-body">
                <h5>Anggota Nonaktif</h5>
                <h2>{{ $anggotaNonaktif }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                5 Buku Terbaru
            </div>

            <ul class="list-group list-group-flush">
                @foreach($bukuTerbaru as $buku)
                    <li class="list-group-item">
                        {{ $buku->judul }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                5 Anggota Terbaru
            </div>

            <ul class="list-group list-group-flush">
                @foreach($anggotaTerbaru as $anggota)
                    <li class="list-group-item">
                        {{ $anggota->nama }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<div class="card mt-4">
    <div class="card-header">
        Quick Links
    </div>

    <div class="card-body">

        <a href="{{ route('buku.index') }}"
           class="btn btn-primary me-2">
            Kelola Buku
        </a>

        <a href="{{ route('anggota.index') }}"
           class="btn btn-success me-2">
            Kelola Anggota
        </a>

        <a href="{{ route('home') }}"
           class="btn btn-secondary">
            Home
        </a>

    </div>
</div>
@endsection
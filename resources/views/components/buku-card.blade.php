<div class="card mb-3">
    <div class="card-body">

        <div class="row">

            <div class="col-md-2 text-center">

                <i class="bi bi-book text-primary"
                   style="font-size:4rem;"></i>

                <div class="mt-2">

                    <span class="badge bg-primary">
                        {{ $buku->kategori }}
                    </span>

                </div>

            </div>

            <div class="col-md-7">

                <h5>{{ $buku->judul }}
                    
                </h5>

                <p class="text-muted">
                    {{ $buku->pengarang }}
                </p>

                <p>
                    {{ $buku->harga_format }}
                </p>

            </div>

            <div class="col-md-3 text-end">

                @if($buku->stok > 0)

                    <span class="badge bg-success">
                        Tersedia
                    </span>

                @else

                    <span class="badge bg-danger">
                        Habis
                    </span>

                @endif

                <div class="mt-2">

                    Stok:
                    {{ $buku->stok }}

                </div>

                @if($showActions)

                    <div class="btn-group-vertical d-grid gap-2">
    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-info text-white">
        <i class="bi bi-eye"></i> Detail
    </a>
    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-warning">
        <i class="bi bi-pencil"></i> Edit
    </a>
    
    {{-- Tombol Hapus Dinonaktifkan Sementara --}}
</div>

                @endif

            </div>

        </div>

    </div>
</div>
<div class="card mb-3">
    <div class="card-body">

        <div class="row">

            <div class="col-md-2 text-center">

                <i class="bi bi-book text-primary"
                   style="font-size:4rem;"></i>

                <div class="mt-2">

                    <span class="badge bg-primary">
                        <?php echo e($buku->kategori); ?>

                    </span>

                </div>

            </div>

            <div class="col-md-7">

                <h5><?php echo e($buku->judul); ?>

                    
                </h5>

                <p class="text-muted">
                    <?php echo e($buku->pengarang); ?>

                </p>

                <p>
                    <?php echo e($buku->harga_format); ?>

                </p>

            </div>

            <div class="col-md-3 text-end">

                <?php if($buku->stok > 0): ?>

                    <span class="badge bg-success">
                        Tersedia
                    </span>

                <?php else: ?>

                    <span class="badge bg-danger">
                        Habis
                    </span>

                <?php endif; ?>

                <div class="mt-2">

                    Stok:
                    <?php echo e($buku->stok); ?>


                </div>

                <?php if($showActions): ?>

                    <div class="btn-group-vertical d-grid gap-2">
    <a href="<?php echo e(route('buku.show', $buku->id)); ?>" class="btn btn-sm btn-info text-white">
        <i class="bi bi-eye"></i> Detail
    </a>
    <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" class="btn btn-sm btn-warning">
        <i class="bi bi-pencil"></i> Edit
    </a>
    
    
</div>

                <?php endif; ?>

            </div>

        </div>

    </div>
</div><?php /**PATH E:\semester 4\matkul pemweb2\kuliah\kuliahku\resources\views/components/buku-card.blade.php ENDPATH**/ ?>

 
<?php $__env->startSection('title', 'Daftar Buku'); ?>
 
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-book"></i>
        Daftar Buku
    </h1>
    <div>
    <a href="<?php echo e(route('buku.export')); ?>"
       class="btn btn-success me-2">
        <i class="bi bi-download"></i>
        Export CSV
    </a>

    <a href="<?php echo e(route('buku.create')); ?>"
       class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Buku
    </a>
</div>
</div>
 

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Buku</h6>
                        <h2 class="mb-0"><?php echo e($totalBuku); ?></h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Tersedia</h6>
                        <h2 class="mb-0"><?php echo e($bukuTersedia); ?></h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Habis</h6>
                        <h2 class="mb-0"><?php echo e($bukuHabis); ?></h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div class="card mb-4">
    <div class="card-body">
        <h5 class="mb-3">
            <i class="bi bi-search"></i>
            Search & Filter Buku
        </h5>

        <form action="<?php echo e(route('buku.search')); ?>" method="GET">
            <div class="row">

                <div class="col-md-3 mb-2">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari judul, pengarang..."
                           value="<?php echo e(request('keyword')); ?>">
                </div>

                <div class="col-md-2 mb-2">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Programming">Programming</option>
                        <option value="Database">Database</option>
                        <option value="Web Design">Web Design</option>
                        <option value="Networking">Networking</option>
                        <option value="Data Science">Data Science</option>
                    </select>
                </div>

                <div class="col-md-2 mb-2">
                    <select name="tahun" class="form-select">
                        <option value="">Semua Tahun</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>

                <div class="col-md-2 mb-2">
                    <select name="ketersediaan" class="form-select">
                        <option value="">Semua</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>

                <div class="col-md-3 mb-2">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>

                    <a href="<?php echo e(route('buku.index')); ?>"
                       class="btn btn-secondary">
                        Reset
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>


<div class="card mb-4">
    <div class="card-body">
        <h6 class="card-title">
            <i class="bi bi-funnel"></i> Filter Kategori:
        </h6>
        <div class="btn-group" role="group">
            <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-sm <?php echo e(!isset($kategori) ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Semua
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Programming')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Programming' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Programming
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Database')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Database' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Database
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Web Design')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Web Design' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Web Design
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Networking')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Networking' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Networking
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Data Science')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Data Science' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Data Science
            </a>
        </div>
    </div>
</div>
 
<form action="<?php echo e(route('buku.bulk-delete')); ?>" method="POST">

    <?php echo csrf_field(); ?>

    <div class="card mb-3">
        <div class="card-body">

            <div class="form-check">
                <input type="checkbox"
                       id="select-all"
                       class="form-check-input">

                <label class="form-check-label">
                    Pilih Semua
                </label>
            </div>

            <button type="submit"
                    class="btn btn-danger btn-sm mt-2">
                Hapus Terpilih
            </button>

        </div>
    </div>

    <?php $__empty_1 = true; $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="card mb-2">
            <div class="card-body">

                <div class="form-check mb-2">
                    <input type="checkbox"
                           name="buku_ids[]"
                           value="<?php echo e($buku->id); ?>"
                           class="form-check-input buku-checkbox">
                </div>

                <?php if (isset($component)) { $__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959 = $attributes; } ?>
<?php $component = App\View\Components\BukuCard::resolve(['buku' => $buku] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buku-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BukuCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959)): ?>
<?php $attributes = $__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959; ?>
<?php unset($__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959)): ?>
<?php $component = $__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959; ?>
<?php unset($__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959); ?>
<?php endif; ?>

            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="alert alert-info">
        Tidak ada data buku
    </div>

<?php endif; ?>
</form>
 
<?php if($bukus->count() > 0): ?>
    <div class="text-center mt-4">
        <p class="text-muted">
            Menampilkan <?php echo e($bukus->count()); ?> buku
            <?php if(isset($kategori)): ?>
                dari kategori <strong><?php echo e($kategori); ?></strong>
            <?php endif; ?>
        </p>
    </div>
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('select-all')?.addEventListener('change', function() {

    document.querySelectorAll('.buku-checkbox')
        .forEach(cb => {
            cb.checked = this.checked;
        });

});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\semester 4\matkul pemweb2\kuliah\kuliahku\resources\views/buku/index.blade.php ENDPATH**/ ?>
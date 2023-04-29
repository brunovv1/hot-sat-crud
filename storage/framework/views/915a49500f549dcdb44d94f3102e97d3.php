

<?php $__env->startSection('content'); ?>
<main class="container">
    <style>
        section {
            margin-top: 10px;}
        </style>
    <section>
        <div class="titlebar">
            <h1>Produtos</h1>
            <a href="<?php echo e(route('products.create')); ?>" class ='btn-link'>Adicionar</a>
        </div>

        <?php if($message = Session::get('success')): ?>
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?php echo e($message); ?>'
        })
    </script>
<?php endif; ?>

        <div class="table">
            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">Produtos</p>
                        </li>
                    </ul>
                </div>
            </div>
            <form method="GET" action="<?php echo e(route ('products.index')); ?>" accept-charset=UTF-8 role="search">     
              
                    <div class="table-search">   
                    <div>
                    <button class="search-select">
                        Pesquisar produto
                    </button>
                    <span class="search-select-arrow">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" name="search" placeholder="Pesquisar produto..." value="<?php echo e(request('search')); ?>">
                </div>
                    </div>
                         </form>
            <div class="table-product-head">
                <p>Imagem</p>
                <p>Nome</p>
                <p>Categoria</p>
                <p>Estoque</p>
                <p>Ações</p>
            </div>
            <div class="table-product-body">
            <?php if(count($products) > 0): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('images/' . $product->image)); ?>">
                    <p><?php echo e($product->name); ?></p>
                    <p><?php echo e($product->category); ?></p>    
                    <p><?php echo e($product->quantity); ?></p>
                    <div>     
                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-success btn-sm">
    <i class="fas fa-pencil-alt"></i> 
</a>

                        </a>
                        <form method="POST" action="<?php echo e(route('products.destroy', $product->id)); ?>">
                            <?php echo method_field('delete'); ?>
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-danger" onClick="deleteConfirm(event)">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p>Produto não encontrado!</p>
            <?php endif; ?>
        </div>
        <div class="table-paginate">    
            <?php echo e($products->links('layouts.pagination')); ?>

        </div>
    </div>
</section>
</main>

<script>
    window.deleteConfirm = function (e) {
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
})
    }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bruno\Desktop\hotsat\minigestor\resources\views/products/index.blade.php ENDPATH**/ ?>
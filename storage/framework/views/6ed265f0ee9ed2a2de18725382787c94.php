
<?php $__env->startSection('content'); ?>
<main 
    class="container">
    <section>
    <form method="post" action="<?php echo e(route('products.update', $product->id)); ?>" enctype="multipart/form-data">    
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="titlebar">
        <h1>Editar Produto</h1>
        <a class="btn-link"   href="<?php echo e(route('products.index')); ?>">Cancelar</a>
    </div>
    <?php if($errors->any()): ?>
    <div>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <div class="card">
        <div>
            <label>Nome</label>
            <input type="text" name="name" value="<?php echo e($product->name); ?>" >
            <label>Descrição (opcional)</label>
            <textarea cols="10" rows="5" name="descrition" value="<?php echo e($product->description); ?>"><?php echo e($product->description); ?></textarea>
            <label>Alterar Imagem</label>
            <img src="<?php echo e(asset('images/' .$product->image)); ?>" alt="" class="img-product" id="file-preview" />
            <input type="hidden" name="hidden_product_image" value="<?php echo e($product->image); ?>">
            <input type="file" name="image" accept="image/*" onchange="showFile(event)">
        </div>
        <div>
            <label>Categoria</label>
            <select name="category">
                <?php $__currentLoopData = json_decode('{"Celulares":"Celulares", "Smart TV":"Smart TV", "Notebook":"Notebook"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($optionKey); ?>"   <?php echo e((isset($product->category) && $product->category == $optionKey) ? 'selected' : ''); ?>> <?php echo e($optionValue); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <hr>
            <label>Estoque</label>
            <input type="text" class="input" name="quantity" value="<?php echo e($product->quatity); ?>">
            <hr>
            <label>Preço</label>
            <input type="text" class="input" name="price" value="<?php echo e($product->price); ?>">
        </div>
    </div>
    <div class="titlebar">
        <h1></h1>
        <input type="hidden" name="hidden_id" value="<?php echo e($product->id); ?>">
        <button>Salvar</button>
    </div>
</form>

        </section>
</main>
<script>
   function showFile(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('file-preview');
        if (input.files && input.files[0]) {
            output.src = dataURL;
        }
    };
    reader.readAsDataURL(input.files[0]);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bruno\Desktop\hotsat\minigestor\resources\views/products/edit.blade.php ENDPATH**/ ?>
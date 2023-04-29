<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- __ -->

        
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 
        <link rel="stylesheet" href="/css/style.css">
        <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <script src="/js/script.js"></script>
        
        <!-- __ -->

    

        <title><?php echo $__env->yieldContent('title', 'Minigestor'); ?></title>
        <link type="image" href="public\imgs\FAVICON.png">

        
    </head>
    <body>
           <header>
        <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Cadastrar Produtos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>
                
                

           

</header>
        <?php echo $__env->yieldContent('content'); ?>
   <footer>
    Minigestor &Copyrights @2023
</footer>
    </body>
</html>
<?php /**PATH C:\Users\bruno\Desktop\hotsat\minigestor\resources\views//layouts/main.blade.php ENDPATH**/ ?>
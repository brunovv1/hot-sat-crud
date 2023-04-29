<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minigestor - Cadastro</title>
<link rel="stylesheet" href="/css/stylecad.css">
</head>
<body>
    
<h2>Formulário de Cadastro</h2>
	<form>
		<label for="username">Nome de Usuário:</label>
		<input type="text" id="username" name="username" required><br><br>
		
		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email" required><br><br>
		
		<label for="password">Senha:</label>
		<input type="password" id="password" name="password" required><br><br>
		
		<input type="submit" value="Enviar">
	</form>
    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>
    
</body>
</html>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bruno\Desktop\hotsat\minigestor\resources\views/cadastro.blade.php ENDPATH**/ ?>
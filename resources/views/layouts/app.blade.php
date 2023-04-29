<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
          <!-- __ -->
       
        <link rel="icon" type="image/png" href="images/icone-svg.svg">
        <link rel="stylesheet" href="/css/style.css">
        <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <script src="/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       
  
          <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>

         
          <!-- __ -->   

        <title>@yield('title', 'Minigestor')</title>
        <link type="image" href="public\imgs\FAVICON.png">

        
    </head>
    <body>  
    <img src="{{ asset('images/Minigestor logo.png') }}" alt="Minigestor Logo" class="logominigestor width=200 height=150">
     
    
     <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('products.index')}}">Produtos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Disabled</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Disabled</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>
      
      
   
 
    @yield('content')
    </body>
    
    <style>
  .fixfooter {
    position: fixed;
    bottom: 0;
        left: 0;
        right: 0;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
  }
</style>

<footer class="fixfooter">
    Minigestor &copy; 2023
</footer>

</footer>
</html>

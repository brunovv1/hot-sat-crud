@extends('layouts.app')
@section('content')
<main 
    class="container">
    <section>
    <form method="post" action="{{ route('products.update', $product->id)}}" enctype="multipart/form-data">    
    @csrf
    @method('PUT')
    <div class="titlebar">
        <h1>Editar Produto</h1>
        <a class="btn-link"   href="{{ route('products.index')}}">Cancelar</a>
    </div>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card">
        <div>
            <label>Nome</label>
            <input type="text" name="name" value="{{$product->name}}" >
            <label>Descrição (opcional)</label>
            <textarea cols="10" rows="5" name="descrition" value="{{$product->description}}">{{ $product->description}}</textarea>
            <label>Alterar Imagem</label>
            <img src="{{ asset('images/' .$product->image) }}" alt="" class="img-product" id="file-preview" />
            <input type="hidden" name="hidden_product_image" value="{{$product->image}}">
            <input type="file" name="image" accept="image/*" onchange="showFile(event)">
        </div>
        <div>
            <label>Categoria</label>
            <select name="category">
                @foreach (json_decode('{"Celulares":"Celulares", "Smart TV":"Smart TV", "Notebook":"Notebook"}', true) as $optionKey => $optionValue )
                    <option value="{{$optionKey}}"   {{(isset($product->category) && $product->category == $optionKey) ? 'selected' : ''}}> {{ $optionValue }} </option>
                @endforeach
            </select>
            <hr>
            <label>Estoque</label>
            <input type="text" class="input" name="quantity" value="{{$product->quatity}}">
            <hr>
            <label>Preço</label>
            <input type="text" class="input" name="price" value="{{$product->price}}">
        </div>
    </div>
    <div class="titlebar">
        <h1></h1>
        <input type="hidden" name="hidden_id" value="{{$product->id}}">
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
@endsection
@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <form method="post" action="{{ route('products.store')}}" enctype="multipart/form-data">    
            @csrf
            <div class="titlebar">
                <h1>Adicionar Produto</h1>
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
                <input type="text" name="name">
                <label>Descrição (opcional)</label>
                <textarea cols="10" rows="5" name="description"></textarea>
                <label>Adicionar Imagem</label>
                <img alt="" class="img-product" id="file-preview" src="" />
                <input type="file" name="image" accept="image/*" onchange="showFile(event)">
            </div>
            <div>
                <label>Categoria</label>
                <select name="category">
                    @foreach (json_decode('{"Celulares":"Celulares", "Smart TV":"Smart TV", "Notebook":"Notebook"}', true) as $optionKey => $optionValue )
                        <option value="{{$optionKey}}"> {{ $optionValue }} </option>
                    @endforeach
                </select>
                <hr>
                <label>Estoque</label>
                <input type="text" class="input" name="quantity">
                <hr>
                <label>Preço</label>
                <input type="text" class="input" name="price">
            </div>
        </div>
        <div class="titlebar">
            <h1></h1>
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
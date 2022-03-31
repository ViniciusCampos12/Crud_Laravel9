@if (isset($product->id))
    <form action="{{ route('produto.update', [$product->id]) }}" method="post">
        @method('PUT')
    @else
        <form method="post" action="{{ route('produto.store') }}">
@endif

@csrf
@if ($errors->any())
    @foreach ($errors->all() as $erro)
        <div class="alert alert-danger" role="alert">
            {{ $erro }}
        </div>
    @endforeach
@endif

@if(isset($option))
@foreach ($option as $product )
@endforeach
@endif

<div class="mb-5">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" @if (isset($product->name)) value="{{ $product->name }}" @endif
        name="name" aria-describedby="nome">
</div>

<div class="mb-3">
    <p>Segure o Ctrl para selecionar mais de uma categoria</p>
    <select name="tag[]" class="form-select" multiple="multiple">
        @foreach ($tags as $tag)
            <option value="{{ $tag->id}}" @if(isset($product->tags))@foreach ($product->tags as $tags ){{ $tags->name == $tag->name ? "selected" : ""}} @endforeach @endif>
            {{ $tag->name }}
            </option>
        @endforeach
    </select>
    <br><br>
    <button type="submit" class="btn btn-primary">Enviar</button>
     <button type="button" class="btn btn-secondary" onclick=" location.href='{{ route('produto.index')}}'" > {{ __('Voltar') }}</button>
</div>
</form>





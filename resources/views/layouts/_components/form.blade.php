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

@if (isset($option))
    @foreach ($option as $product)
    @endforeach
@endif

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Preencha os dados para cadastrar um produto</div>
            <div class="card-body">
                <div class="col-md-8 offset-md-2">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control"
                        @if (isset($product->name)) value="{{ $product->name }}"  @endif  name="name"
                        aria-describedby="nome">

                    <label for="tag" class="form-label">Segure o Ctrl para selecionar mais de uma categoria</label>
                    <select name="tag[]" class="form-select" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                @if (isset($product->tags)) @foreach ($product->tags as $tags){{ $tags->name == $tag->name ? 'selected' : '' }} @endforeach @endif>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-5">
                <div class="offset-md-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary"
                        onclick=" location.href='{{ route('produto.index') }}'">
                        {{ __('Voltar') }}</button>
                </div>
            </div>

        </div>
    </div>
</div>
</form>

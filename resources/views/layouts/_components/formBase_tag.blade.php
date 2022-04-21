@if (isset($tags->id))
    <form action="{{ route('tag.update', [$tags->id]) }}" method="post">
        @method('PUT')
    @else
        <form method="post" action="{{ route('tag.store') }}">
@endif
@csrf
@if ($errors->any())
    @foreach ($errors->all() as $erro)
        <div class="alert alert-danger" role="alert">
            {{ $erro }}
        </div>
    @endforeach
@endif

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Preencha os dados para cadastrar uma tag</div>
            <div class="card-body">
                <div class="col-md-5 offset-md-4">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control"
                        @if (isset($tags->name)) value="{{ $tags->name }}" @endif name="name"
                        aria-describedby="nome">
                </div>
            </div>
            <div class="row mb-5">
                <div class="offset-md-5">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary"
                        onclick=" location.href='{{ route('tag.index') }}'"> {{ __('Voltar') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

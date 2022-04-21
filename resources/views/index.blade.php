@extends('layouts.base')

@section('title', 'Index')

@section('conteudo')

    <main>
        <div class="m-5">
            <div style="position:relative; margin-bottom: 10px; text-align: center; padding: 10px; background-color: #d3d3d3; border-radius: 20px; color: black;">
                <figure>
                   @if(Auth::user()->avatar) <img style="border-radius: 50%; width: 6%;" src="{{ Auth::user()->avatar }}  alt="picture">  @endif
                        <figcaption><h5>Bem vindo, {{ Auth::user()->name }}</h5></figcaption>
                </figure>
        </div>
            <div style="margin-bottom: 15px; text-align: right; padding: 5px; position:absolute; top:55px; right:55px;">
                <a href="{{ route('logout') }}" class="btn btn-lg btn-danger">
                    <span class="glyphicon glyphicon-log-out"></span> Log out </a>
            </div>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tags</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @foreach ($product->tags as $tag)
                                    {{ $tag->name }}</br>
                                @endforeach
                            </td>
                            <td>
                                @component('layouts._components.delete', ['result' => $product, 'method' =>
                                    'produto.destroy'])
                                    <button type="button" class="btn btn-primary "" onclick="
                                        location.href='{{ route('produto.edit', [$product->id]) }}'">Editar</button>
                                                     <button type=" submit" class="btn btn-danger "" onclick="
                                        location.href='{{ route('produto.destroy', [$product->id]) }}'">Deletar</button>
    @endcomponent
                                    </td>
                                    </tr>
     @endforeach

                </tbody>
            </table>
            <main>

                <button type="button" class="btn btn-secondary ""  onclick=" location.href='{{ route('produto.create') }}'">Novo Produto</button>
        <button type=" button" class="btn btn-secondary ""  onclick=" location.href='{{ route('tag.create') }}'">Nova Categoria</button>
        <button type=" button" class="btn btn-secondary ""  onclick=" location.href='{{ route('tag.index') }}'">Listar categorias</button>


@endsection

@extends('layouts.base')

@section('title', 'Index')

@section('conteudo')

<main>
    <div class="m-5">


        <div style="text-align: center; padding: 10px; background-color: #787878; border-radius: 10px">
            <h3>Bem vindo, {{ Auth::user()->name }}</h3>
        </div>

        <div style="text-align: right; padding: 10px;">
            <a href="{{ route('logout') }}" class="btn btn-info btn-lg btn-danger">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
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
                            @foreach ($product->tags as  $tag)
                               {{$tag->name}}</br>
                            @endforeach
                            </td>
                            <td>
                                @component('layouts._components.delete', ['result' => $product, 'method' => 'produto.destroy'])
                                    <button type="button" class="btn btn-primary "" onclick="location.href='{{ route('produto.edit', [$product->id]) }}'">Editar</button>
                                     <button type="submit" class="btn btn-danger "" onclick=" location.href='{{route('produto.destroy', [$product->id] )}}'">Deletar</button>
                                @endcomponent
                            </td>
                            </tr>
                         @endforeach

                </tbody>
            </table>
<main>

<button type="button" class="btn btn-secondary ""  onclick=" location.href='{{ route('produto.create') }}'">Novo Produto</button>
<button type=" button" class="btn btn-secondary ""  onclick=" location.href='{{ route('tag.create') }}'">Nova Categoria</button>
<button type=" button" class="btn btn-secondary ""  onclick="location.href='{{ route('tag.index')}}'">Listar categorias</button>


@endsection

@extends('layouts.base')

@section('title', 'Tags')

@section('conteudo')

<main>
    <div class="m-5">
        <h1 align="center">Tags</h1>

        <table class="table table-dark table-striped">
             <thead>
                 <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
             </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>


                                @component('layouts._components.delete', ['result' => $tag, 'method'    => 'tag.destroy'])
                                    <button type="button" class="btn btn-primary "" onclick="location.href='{{ route('tag.edit', [$tag->id]) }}'">Editar</button>
                                     <button type="submit" class="btn btn-danger "" onclick=" location.href='{{route('tag.destroy', [$tag->id] )}}'">Deletar</button>
                                @endcomponent
                            </td>
                            <td>

                            </td>
                            </tr>
                         @endforeach

                </tbody>
            </table>
<main>

<button type=" button" class="btn btn-secondary ""  onclick="location.href='{{ route('produto.index')}}'">Voltar</button>
@endsection

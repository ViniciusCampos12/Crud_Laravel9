@extends('layouts.base')


@section('title', 'Atualizar Produto')

@section('conteudo')

<h1 align="center">Atualizar Produto</h1>

    @component('layouts._components.form',['product' => $product, 'tags' => $tags, 'option' => $option])

    @endcomponent
@endsection


@extends('layouts.base')


@section('title','Cadastrar Produtos')

@section('conteudo')
    <div class="m-5">

        <h1 align="center">Cadastro de Produtos</h1>

        @component('layouts._components.form', ['tags' => $tags ])

        @endcomponent

    </div>
@endsection

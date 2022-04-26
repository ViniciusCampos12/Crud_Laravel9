@extends('layouts.base')


@section('title', 'Atualizar Tag')

@section('conteudo')

<h1 align="center">Atualizar Tag</h1>

    @component('layouts._components.formBase_tag',['tags' => $tags])

    @endcomponent
@endsection

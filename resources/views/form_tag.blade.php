@extends('layouts.base')


@section('title','Cadastrar Tags')

@section('conteudo')
    <div class="m-5">

        <h1 align="center">Cadastrar Tag</h1>

        @component('layouts._components.formBase_tag')

        @endcomponent

    </div>
@endsection

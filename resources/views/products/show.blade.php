
@extends('layouts.base')

@section('title', 'Show')

@section('conteudo')
<div style="margin: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="col-md-7 offset-md-2">
                <ul class="list-group">
                <li class="list-group-item active">Detalhes</li>
                <li class="list-group-item"><b>#</b> {{$product->id}}</li>
                <li class="list-group-item"><b>Name:</b> {{$product->name}}</li>
                </ul>
                <br>
                <button type="button" class="btn btn-secondary"onclick=" location.href='{{ route('produto.index') }}'">Voltar</button>
</div>
    </div>
        </div>
            </div>
@endsection

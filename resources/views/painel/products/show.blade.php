@extends('painel.templates.template')
@section('title')
    Lista de Produtos
@endsection
@section('content')
<h1 class="title-pg">Produtos {{$product->name}}</h1>
@if (isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif
<p><b>Ativo:</b> {{$product->active}}</p>
<p><b>Número:</b> {{$product->number}}</p>
<p><b>Categoria:</b> {{$product->category}}</p>
<p><b>Descrição:</b> {{$product->description}}</p>
<hr>
{!! Form::open(['route'=>['produtos.destroy',$product->id],'method'=>'DELETE']) !!}
    {!! Form::submit("Deletar Produto: $product->name", ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection


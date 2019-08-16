@extends('painel.templates.template')
@section('title')
    Lista de Produtos
@endsection
@section('content')
<h1 class="title-pg">listagem de Produtos</h1>

<a href="{{ route('produtos.create')}}" class="btn-add btn btn-primary"><i class="fas fa-plus"></i> Cadastar</a>
<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th width="100px;">Ações</th>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{route('produtos.edit',$product->id)}}" class="actions edit">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('produtos.show',$product->id)}}" class="actions delete">
                    <i class="fas fa-eye"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>

{{ $products->links()}}
@endsection


<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    private $product;
    private $totalPages = 3;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate($this->totalPages);
        return view('painel.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar Produto";
        $categorys = ['eletronicos','moveis','limpeza','banho'];
        return view('painel.products.create-edit',compact('categorys','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //Pega todos os dados do formulário
        $dataForm =  $request->all();
        $dataForm['active'] = (!isset($dataForm['active']))? 0 : 1;

        //Valida os dados
        //$this->validate($request, $this->product->rules);

        /*$validate = validator($dataForm, $this->product->rules,$messages);
        if ( $validate->fails() ) {
            return redirect()
                ->route('produtos.create')
                ->withErrors($validate)  
                ->withInput();
        }*/

        //Faz o Cadastro
        $insert = $this->product->create($dataForm);

        if ($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = $this->product->find($id);
        $title = "Produto: {$product->name}";
        return view('painel.products.show',compact('product','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recupera produto pelo id
        $product = $this->product->find($id);

        $title = "Editar Produto: {$product->name}";

        $categorys = ['eletronicos','moveis','limpeza','banho'];

        return view('painel.products.create-edit', compact('title','categorys','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        //Recupera todos os dados do formulario
        $dataForm = $request->all();

        //recupera o item para editar
        $product = $this->product->find($id);

        //verifica se o produto esta ativo
        $dataForm['active'] = (!isset($dataForm['active']))? 0 : 1;

        //altera os items
        $update = $product->update($dataForm);

        //verifica se realmente editou
        if ($update)
            return redirect()->route('produtos.index');
        else
            return redirect()->back()->width(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        $delete = $product->delete();

        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->back()->with(['errors'=>'Falha ao Deletar']);
    }

    
    public function testes()
    {
       /*
        $insert = $this->product->create([
            'name' => 'Televisão',
            'number' => '5',
            'active' => 1,
            'category' => 'eletronicos',
            'description' => 'lg'
        ]);
        if ( $insert )
            return "Inserido Com Sucesso, ID: {$insert->id}";
        else 
            return 'Falaha ao Inserir';
        */
        /*
        $prod = $this->product->find(5);
        $update = $prod->update([
            'name' => 'Televisão teste',
            'number' => '6',
            'active' => 1,
            'category' => 'eletronicos',
            'description' => 'lg'
        ]);
        if ($update)
            return 'Alterado Com sucesso';
        else
            return 'Falha ao Alterar';
        */
        /*$prod = $this->product->find(5);
        $update = $prod->update([
            'name' => 'Televisão teste',
            'number' => '6',
            'active' => 1,
            'category' => 'eletronicos',
            'description' => 'lg'
        ]);
        if ($update)
            return 'Alterado Com sucesso';
        else
            return 'Falha ao Alterar';
        */

        $prod = $this->product->destroy(5);
        $delete =  $prod;

        if($delete)
            return 'Deletado com Sucesso';
        else
            return 'Falha ao Deletar';
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function __construct(Product $product)
    {
        //Middleware para garantir que somente usuários autenticados tenham acesso aos métodos
        $this->middleware('auth');

        //Injeção da model nos métodos
        $this->product = $product;
    }

    /**
     * Exibe todos os produtos e seu relacionamento com as tags
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->orderBy('id', 'ASC')->with('tags')->get();
        return view('index', compact('products'));
    }

    /**
     * Exibe o formulário para criação de um produto
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('id', 'ASC')->get();
        return view('products.form_product',compact('tags'));

    }

    /**
     * Executa a inserção do produto no banco de dados
     *
     * @param  \App\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'   => 'required',
        ],
        [
            'name.required' => 'Preencha o campo',
        ]);

        $this->product->name = $request->name;
        $this->product->save();


        $this->product->tags()->attach($request->get('tag'));

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Exibe o formulário para edição do Produto
     *
     * @param  id do produto $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = $this->product->find($id);
        $tags = Tag::orderBy('id', 'ASC')->get();

        return view('products.update_product',['product' => $product,'tags' => $tags, ]);

    }

    /**
     * Método que atualiza o produto
     *
     * @param  \App\Http\Request $request
     * @param  id do produto  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'name'   => 'unique:products,name'
        ],
        [
            'name.required' => 'Preencha o campo',
            'name.unique'   => 'O nome informado já existe'
        ]);

        $product = $this->product->find($id);
        $product->fill($request->all());
        $product->save();

        DB::statement("DELETE from product_tag WHERE product_id = $id");
        $product->tags()->attach($request->get('tag'));

        return redirect()->route('produto.index');
    }

    /**
     * Deleta um registro no banco
     *
     * @param  id do produto $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();

        return redirect()->route('produto.index');

    }
}

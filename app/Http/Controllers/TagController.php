<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function __construct(Tag $tag)
    {
        //Middleware para garantir que somente usuários autenticados tenham acesso aos métodos
        $this->middleware('auth');

         //Injeção da model nos métodos
        $this->tag = $tag;
    }

    /**
     * Exibe todas as tags
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tags = $this->tag->orderBy('id','ASC')->get();
       return view('index_tag', compact('tags'));
    }

    /**
     * Exibe o formulário para criação de uma tag
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form_tag');
    }

    /**
     * Executa a inserção da tag no banco de dados
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:tags,name'
        ],
        [
            'name.required' => 'Preencha o campo',
            'name.unique'   => 'A tag já existe!'
        ]);

        $this->tag->name = $request->name;
        $this->tag->save();



        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Exibe o formulário para edição da Tag
     *
     * @param  id da tag $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = $this->tag->find($id);
        return view('update_tag',compact('tags'));
    }

    /**
     * Método que atualiza a Tag
     *
     * @param  \App\Http\Request $request
     * @param  id da tag $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tags = $this->tag->find($id);
        $tags->fill($request->all());
        $tags->save();

        return redirect()->route('tag.index');
    }

    /**
     * Deleta um registro no banco
     *
     * @param  id da tag $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tag->find($id)->delete();
        return redirect()->route('tag.index');
    }
}

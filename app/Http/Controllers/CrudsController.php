<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $data = Crud::latest()->paginate(5);

        return view('index', compact('data'))
               ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'nome' => 'required',
        'sobrenome' => 'required',
        'imagem' => 'required|image|max:2048'
        ]);

         $imagem = $request->file('imagem');

        $new_name = rand() . '.' . $imagem->getClientOriginalExtension();
        $imagem->move(public_path('imagens'), $new_name);
        $form_data = array(
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'imagem' => $new_name
        );

        Crud::create($form_data);

        return redirect('crud')->with('sucesso', 'Dados adicionados com sucesso!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Crud::findOrFail($id);

        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Crud::findOrFail($id);

        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image_name = $request->hidden_image;
        $imagem = $request->file('imagem');

        if ($imagem != '') {
            # code...
            $request->validate([
                'nome' => 'required',
                'sobrenome' => 'required',
                'imagem' => 'image|max:2048'
            ]);
            $image_name = rand() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('imagens'), $image_name);
        }
        else {
            # code...
            $request->validate([
                'nome' => 'required',
                'sobrenome' => 'required'
            ]);
        }
        $form_data = array(
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'imagem' => $image_name
        );

        Crud::whereId($id)->update($form_data);

        return redirect('crud')->with('sucesso', 'Dados atualizados com sucesso!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Crud::FindOrFail($id);
        $data->delete();

        return redirect('crud')->with('sucesso', 'Dados excluidos com sucesso!.');
    }
}

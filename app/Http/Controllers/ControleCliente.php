<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ControleCliente extends Controller
{
    public function index()
    {
        $cliente = Cliente::all();
        if (isset($cliente)){
            return view('cliente', compact('cliente'));
        } else {
            return view('registro');
        }
    }
    public function create()
    {
        return view('registro');
    }
    public function store(Request $request)
    {
        $regras = [
            'nome'=> 'required|min:3|max:30',
            'endereco' => 'required|min:10',
            'idade' => 'required',
            'email' => 'required|unique:clientes|email:rfc,dns'
        ];

        $mensagens = [
            'nome.required' => 'Preencha o campo nome.',
            'endereco.required' => 'Preencha o campo endereço.',
            'idade.required' => 'Preencha o campo idade.',
            'email.required' => 'Preencha o campo e-mail.',
            'email.email' => 'Forneça um e-mail válido.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'nome.max' => 'O nome deve ter no maximo 30 caracteres.',
            'endereco.min' => 'O endereço deve conter pelo menos 10 caracteres',
            'email.unique' => 'E-mail já cadastrado'
        ];

        $request->validate($regras,$mensagens);

        $cliente = new Cliente();
        $cliente->nome =$request->input('nome');
        $cliente->endereco =$request->input('endereco');
        $cliente->idade =$request->input('idade');
        $cliente->email =$request->input('email');

        $cliente->save();

        $cliente = Cliente::all();
        return view('cliente', compact('cliente'));

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}

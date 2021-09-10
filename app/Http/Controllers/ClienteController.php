<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Status;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$clientes = DB::table("cliente AS c")
					->join("status AS s", "c.status", "=", "s.id")
					->select("c.nome", "c.email", "c.id", "s.nome AS status")
					->get();
					
		$cliente = new Cliente();
		$statuses = Status::All();
		
		return view("cliente.index", [
			"clientes" => $clientes,
			"cliente" => $cliente,
			"statuses" => $statuses
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if ($request->get("id") == "") {
			$cliente = new Cliente();
		} else {
			$cliente = Cliente::Find($request->get("id"));
		}
		
		$cliente->nome = $request->get("nome");
		$cliente->cpf = $request->get("cpf");
		$cliente->email = $request->get("email");
		$cliente->telefone = $request->get("telefone");
		$cliente->data_nascimento = $request->get("data_nascimento");
		$cliente->status = $request->get("status");
		
		$cliente->save();
		
		$request->Session()->flash("acao", "salvo");
		
		return redirect("/cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::Find($id);
		return response()->json([
			"nome" => $cliente->nome,
			"cpf" => $cliente->cpf,
			"email" => $cliente->email
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = DB::table("cliente AS c")
					->join("status AS s", "c.status", "=", "s.id")
					->select("c.nome", "c.email", "c.id", "s.nome AS status")
					->get();
					
		$cliente = Cliente::Find($id);
		$statuses = Status::All();
		
		return view("cliente.index", [
			"clientes" => $clientes,
			"cliente" => $cliente,
			"statuses" => $statuses
		]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Cliente::Destroy($id);	
		$request->Session()->flash("acao", "excluido");
		return redirect("/cliente");
    }
}

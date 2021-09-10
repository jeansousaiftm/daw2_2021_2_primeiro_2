<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$status = new Status();
		$statuses = Status::All();
        return view("status.index", [
			"status" => $status,
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
			$status = new Status();
		} else {
			$status = Status::Find($request->get("id"));
		}
		
		$status->nome = $request->get("nome");
		$status->save();
		
		$request->Session()->flash("acao", "salvo");
		
		return redirect("/status");		
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::Find($id);
		$statuses = Status::All();
		return view("status.index", [
			"status" => $status,
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
        Status::Destroy($id);
		$request->Session()->flash("acao", "excluido");
		return redirect("/status");
    }
}

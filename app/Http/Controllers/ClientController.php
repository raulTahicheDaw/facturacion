<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Client::all();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identificacion_fiscal'=> 'max:20',
            'nombre' => 'required|max:50',
            'nombre_comercial'=>'max:50',
            'contacto'=>'max:50',
            'direccion'=>'max:150',
            'municipio'=>'max:50',
            'codigo_postal'=>'max:10',
            'provincia'=>'max:50',
            'telefono'=>'max:50',
            'movil'=>'max:50',
            'fax'=>'max:50',
            'cuenta_bancaria'=>'max:50',
            'banco'=>'max:50',
            'email'=>'max:50',
            'web'=>'max:50',
            'observaciones'=>'max:50'
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $data = $request;

        Client::create($data);
        return response()->json(['success'=>'Cliente guardado correctamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

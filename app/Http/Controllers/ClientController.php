<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $data = $request->validated();
        Client::create($data);
        return response()->json(['success' => 'Cliente guardado correctamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public
    function show(Client $client)
    {
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public
    function update(ClienteRequest $request, Client $client)
    {
        $data = $request->validate([
            'identificacion_fiscal' => 'max:20',
            'nombre' => 'max:50',
            'nombre_comercial' => 'max:50',
            'contacto' => 'max:50',
            'direccion' => 'max:150',
            'municipio' => 'max:50',
            'codigo_postal' => 'max:10',
            'provincia' => 'max:50',
            'telefono' => 'max:50',
            'movil' => 'max:50',
            'fax' => 'max:50',
            'cuenta_bancaria' => 'max:50',
            'banco' => 'max:50',
            'email' => 'max:50',
            'web' => 'max:50',
            'observaciones' => 'max:1000'
        ]);

        if ($request->has('nombre')) {
            $client->nombre = $request->nombre;
        }

        if ($request->has('nombre_comercial')) {
            $client->nombre_comercial = $request->nombre_comercial;
        }
        if ($request->has('indetificacion_fiscal')) {
            $client->indetificacion_fiscal = $request->indetificacion_fiscal;
        }
        if ($request->has('contacto')) {
            $client->contacto = $request->contacto;
        }
        if ($request->has('direccion')) {
            $client->direccion = $request->direccion;
        }
        if ($request->has('municipio')) {
            $client->municipio = $request->municipio;
        }
        if ($request->has('codigo_postal')) {
            $client->codigo_postal = $request->codigo_postal;
        }
        if ($request->has('provincia')) {
            $client->provincia = $request->provincia;
        }
        if ($request->has('telefono')) {
            $client->telefono = $request->telefono;
        }
        if ($request->has('movil')) {
            $client->movil = $request->movil;
        }
        if ($request->has('fax')) {
            $client->fax = $request->fax;
        }
        if ($request->has('cuenta_bancaria')) {
            $client->cuenta_bancaria = $request->cuenta_bancaria;
        }
        if ($request->has('banco')) {
            $client->banco = $request->banco;
        }
        if ($request->has('email')) {
            $client->email = $request->email;
        }
        if ($request->has('web')) {
            $client->web = $request->web;
        }
        if ($request->has('observaciones')) {
            $client->observaciones = $request->observaciones;
        }

        if ($client->isClean()) {
            return response()->json(['success' => 'Sin cambios']);
        }

        $client->save();

        return response()->json(['success' => 'Cliente actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Client $client)
    {
        $client->delete();
        return response()->json(['success' => 'Cliente borrado correctamente']);
    }
}

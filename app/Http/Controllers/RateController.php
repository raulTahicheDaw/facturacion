<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarifaRequest;
use App\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = Rate::all();
        return view('tarifas.index', compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifaRequest $request)
    {
        $data = $request->validated();
        Rate::create($data);
        return response()->json(['success' => 'Tarifa guardada correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        return $rate;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(TarifaRequest $request, Rate $rate)
    {
        $data = $request->validate([
            'nombre' => 'max:50',
            'descripcion' => 'string|max:500',
            'precio_hora' => "required|regex:/^\d*(\.\d{1,2})?$/",
        ]);

        if ($request->has('nombre')) {
            $rate->nombre = $request->nombre;
        }

        if ($request->has('descripcion')) {
            $rate->descripcion = $request->descripcion;
        }
        if ($request->has('precio_hora')) {
            $rate->precio_hora = $request->precio_hora;
        }


        if ($rate->isClean()) {
            return response()->json(['success' => 'Sin cambios']);
        }

        $rate->save();

        return response()->json(['success' => 'Tarifa actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return response()->json(['success' => 'Tarifa borrada correctamente']);
    }
}

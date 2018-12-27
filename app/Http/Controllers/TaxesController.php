<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasaRequest;
use App\Taxes;


class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasas = Taxes::all();
        return view('tasas.index', compact('tasas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TasaRequest $request)
    {
        $data = $request->validated();
        Taxes::create($data);
        return response()->json(['success' => 'Tasa guardada correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taxes  $taxes
     * @return Taxes
     */
    public function show($id)
    {
        $tasa = Taxes::find($id);
        return $tasa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxes $taxes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function update(TasaRequest $request, $id)
    {
        $taxes = Taxes::find($id);

        $data = $request->validate([
            'nombre' => 'max:50',
            'observaciones' => 'string|max:500',
            'porcentaje' => "required|regex:/^\d*(\.\d{1,2})?$/",
        ]);

        if ($request->has('nombre')) {
            $taxes->nombre = $request->nombre;
        }

        if ($request->has('observaciones')) {
            $taxes->observaciones = $request->observaciones;
        }
        if ($request->has('porcentaje')) {
            $taxes->porcentaje = $request->porcentaje;
        }


        if ($taxes->isClean()) {
            return response()->json(['success' => 'Sin cambios']);
        }

        $taxes->save();

        return response()->json(['success' => 'Tasa actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taxes = Taxes::find($id);

        $taxes->delete();
        return response()->json(['success' => 'Tasa borrada correctamente']);
    }
}

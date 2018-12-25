<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasServicios = ServiceCategory::all();
        return view('categorias.index', compact('categoriasServicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $data['nombre'] = $request->nombre;
        $data['descripcion'] = $request->descripcion;
        ServiceCategory::create($data);
        return response()->json(['success' => 'Categoría guardada correctamente',
            'data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceCategory $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        return $serviceCategory;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceCategory $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ServiceCategory $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceCategory $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        //
    }
}

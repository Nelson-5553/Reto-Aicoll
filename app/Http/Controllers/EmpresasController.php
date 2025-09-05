<?php

namespace App\Http\Controllers;


use App\Models\Empresas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Helpers\NitHelper;


class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresas::all();
        // dd($empresas);
        return view('index', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreEmpresaRequest $request)
{
    $empresas = new Empresas();
    $empresas->nit = NitHelper::generarNIT(); // Genera un NIT con DV
    $empresas->fill($request->validated());
    $empresas->save();

    return redirect()->back()->with('success', 'Empresa creada exitosamente.');
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresas $empresas)
    {
        return view('edit', compact('empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresas $empresas)
    {
        $empresas->update($request->validated());

        return redirect()->route('empresas.edit', $empresas)->with('success', 'Empresa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresas $empresas)
    {
        // Validar que la empresa no esté activa antes de eliminarla
        if ($empresas->estado === 'activo') {
            return redirect()->route('empresas.index')->with('error', 'No puede Borrar una Empresa Activa.');
        }

        $empresas->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada exitosamente.');
    }
}

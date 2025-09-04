<?php

namespace App\Http\Controllers;


use App\Models\Empresas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpresaRequest;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreEmpresaRequest $request)
{
    $empresas = new Empresas();
    $empresas->nit = NitHelper::generarNIT();
    $empresas->fill($request->validated());
    $empresas->save();

    return redirect()->back()->with('success', 'Empresa creada exitosamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(Empresas $empresas)
    {
        //
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
    public function update(Request $request, Empresas $empresas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresas $empresas)
    {
        //
    }
}

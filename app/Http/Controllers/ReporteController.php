<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('reportes.crear-reporte');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $reporte = new Reporte;
        $reporte->user_id = $request->user()->id;
        $reporte->descripcion = $request->descripcion;
        $reporte->ubicacion = $request->ubicacion;
        $reporte->fecha_inicio = $request->fecha_inicio;
        $reporte->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}

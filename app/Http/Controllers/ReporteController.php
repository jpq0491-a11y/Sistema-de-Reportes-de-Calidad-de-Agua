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
    public function index(Request $request): View
    {
        return view('reportes.listar-reportes')->with([
            'reportes' => $request->user()->reportes()->with('user')->latest('id')->get(),
        ]);
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
        $request->user()->reportes()->create(
            $request->only(['ubicacion', 'descripcion', 'fecha_inicio'])
        );

        return redirect()->route('reporte.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte): View
    {
        return view('reportes.ver-reporte')->with([
            'reporte' => $reporte,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte): View
    {
        return view('reportes.editar-reporte')->with([
            'reporte' => $reporte,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte): RedirectResponse
    {
        $reporte->update($request->only(['ubicacion', 'descripcion', 'fecha_inicio']));

        return redirect()->route('reporte.show', $reporte);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte): RedirectResponse
    {
        $reporte->delete();

        return redirect()->route('reporte.index');
    }
}

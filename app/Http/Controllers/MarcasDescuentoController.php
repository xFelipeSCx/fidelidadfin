<?php

namespace App\Http\Controllers;

use App\Models\MarcasDescuento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MarcasDescuentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MarcasDescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $marcasDescuentos = MarcasDescuento::paginate();

        return view('marcas-descuento.index', compact('marcasDescuentos'))
            ->with('i', ($request->input('page', 1) - 1) * $marcasDescuentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $marcasDescuento = new MarcasDescuento();

        return view('marcas-descuento.create', compact('marcasDescuento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarcasDescuentoRequest $request): RedirectResponse
    {
        MarcasDescuento::create($request->validated());

        return Redirect::route('marcas-descuentos.index')
            ->with('success', 'MarcasDescuento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $marcasDescuento = MarcasDescuento::find($id);

        return view('marcas-descuento.show', compact('marcasDescuento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $marcasDescuento = MarcasDescuento::find($id);

        return view('marcas-descuento.edit', compact('marcasDescuento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarcasDescuentoRequest $request, MarcasDescuento $marcasDescuento): RedirectResponse
    {
        $marcasDescuento->update($request->validated());

        return Redirect::route('marcas-descuentos.index')
            ->with('success', 'MarcasDescuento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        MarcasDescuento::find($id)->delete();

        return Redirect::route('marcas-descuentos.index')
            ->with('success', 'MarcasDescuento deleted successfully');
    }
}

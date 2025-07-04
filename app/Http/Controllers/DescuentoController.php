<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DescuentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $descuentos = Descuento::paginate();

        return view('descuento.index', compact('descuentos'))
            ->with('i', ($request->input('page', 1) - 1) * $descuentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $descuento = new Descuento();

        return view('descuento.create', compact('descuento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DescuentoRequest $request): RedirectResponse
    {
        Descuento::create($request->validated());

        return Redirect::route('descuentos.index')
            ->with('success', 'Descuento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $descuento = Descuento::find($id);

        return view('descuento.show', compact('descuento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $descuento = Descuento::find($id);

        return view('descuento.edit', compact('descuento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DescuentoRequest $request, Descuento $descuento): RedirectResponse
    {
        $descuento->update($request->validated());

        return Redirect::route('descuentos.index')
            ->with('success', 'Descuento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Descuento::find($id)->delete();

        return Redirect::route('descuentos.index')
            ->with('success', 'Descuento deleted successfully');
    }
}

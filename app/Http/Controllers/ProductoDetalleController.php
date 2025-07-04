<?php

namespace App\Http\Controllers;

use App\Models\ProductoDetalle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoDetalleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productoDetalles = ProductoDetalle::paginate();

        return view('producto-detalle.index', compact('productoDetalles'))
            ->with('i', ($request->input('page', 1) - 1) * $productoDetalles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productoDetalle = new ProductoDetalle();

        return view('producto-detalle.create', compact('productoDetalle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoDetalleRequest $request): RedirectResponse
    {
        ProductoDetalle::create($request->validated());

        return Redirect::route('producto-detalles.index')
            ->with('success', 'ProductoDetalle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productoDetalle = ProductoDetalle::find($id);

        return view('producto-detalle.show', compact('productoDetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productoDetalle = ProductoDetalle::find($id);

        return view('producto-detalle.edit', compact('productoDetalle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoDetalleRequest $request, ProductoDetalle $productoDetalle): RedirectResponse
    {
        $productoDetalle->update($request->validated());

        return Redirect::route('producto-detalles.index')
            ->with('success', 'ProductoDetalle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ProductoDetalle::find($id)->delete();

        return Redirect::route('producto-detalles.index')
            ->with('success', 'ProductoDetalle deleted successfully');
    }
}

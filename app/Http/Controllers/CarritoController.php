<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CarritoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Producto;
use App\Models\User;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $carritos = Carrito::paginate();

        return view('carrito.index', compact('carritos'))
            ->with('i', ($request->input('page', 1) - 1) * $carritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $carrito = new Carrito();

        return view('carrito.create', compact('carrito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarritoRequest $request): RedirectResponse
    {
        Carrito::create($request->validated());

        return Redirect::route('carritos.index')
            ->with('success', 'Carrito created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $carrito = Carrito::find($id);

        return view('carrito.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $carrito = Carrito::find($id);

        return view('carrito.edit', compact('carrito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarritoRequest $request, Carrito $carrito): RedirectResponse
    {
        $carrito->update($request->validated());

        return Redirect::route('carritos.index')
            ->with('success', 'Carrito updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Carrito::find($id)->delete();

        return Redirect::route('carritos.index')
            ->with('success', 'Carrito deleted successfully');
    }


    public function carrito(Request $request): View
    {
        $userId = Auth::id();

        // 1. Obtener carritos del usuario con paginación
        $carritos = Carrito::where('user_id', $userId)->paginate(10);

        // 2. Obtener los productos relacionados con esos carritos
        $productos = Producto::whereIn('id', $carritos->pluck('id_producto'))->get()->keyBy('id');

        return view('carrito.carrito', [
            'carritos' => $carritos,
            'productos' => $productos,
            'i' => ($request->input('page', 1) - 1) * $carritos->perPage(),
        ]);
    }
    public function añadirCarrito(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
        ]);

        $userId = Auth::id();
        $productoId = $request->id_producto;


        $carrito = Carrito::where('user_id', $userId)
            ->where('id_producto', $productoId)
            ->first();

        if ($carrito) {

            $carrito->cantidad += 1;
            $carrito->save();
        } else {
            Carrito::create([
                'id_producto' => $productoId,
                'user_id' => $userId,
                'cantidad' => 1,
            ]);
        }

        return redirect()->route('tienda')->with('success', 'Producto añadido al carrito.');
    }
    public function guardarCarrito(Request $request, Carrito $carrito): RedirectResponse
    {
        $validated = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito->update([
            'cantidad' => $validated['cantidad'],
        ]);

        return Redirect::route('carrito')->with('success', 'Cantidad actualizada correctamente.');
    }
    public function eliminarCarrito($id): RedirectResponse
    {
        Carrito::find($id)->delete();

        return Redirect::route('carrito')
            ->with('success', 'Carrito deleted successfully');
    }
    public function pagarCarrito(): RedirectResponse
    {
        $usuario = Auth::user();

        // Obtener todos los productos del carrito del usuario
        $carritos = Carrito::where('user_id', $usuario->id)->get();

        if ($carritos->isEmpty()) {
            return Redirect::route('carrito')->with('info', 'Tu carrito está vacío.');
        }

        // Calcular los puntos totales a otorgar (20 puntos por unidad de producto)
        $puntosGanados = $carritos->sum(function ($carrito) {
            return $carrito->cantidad * 20;
        });

        // Sumar puntos al usuario
        $usuario->puntos += $puntosGanados;
        $usuario->save();

        // Vaciar el carrito
        Carrito::where('user_id', $usuario->id)->delete();

        return Redirect::route('carrito')->with('success', 'Carrito pagado con éxito. Ganaste ' . $puntosGanados . ' puntos.');
    }

}

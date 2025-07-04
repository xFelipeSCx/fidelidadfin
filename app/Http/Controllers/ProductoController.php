<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $producto = new Producto();

        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos básicos (ajusta según necesites)
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'regalo' => 'boolean',
            'activo' => 'boolean',
            'foto' => 'nullable|image|max:153600', // validar imagen max 2MB
            // otros campos que necesites...
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $originalName = $file->getClientOriginalName();
            $filename = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $counter = 0;
            $newFilename = $filename . '.' . $extension;

            // Verifica si ya existe el archivo, si sí, agrega sufijo numérico
            while (file_exists(public_path('images/' . $newFilename))) {
                $counter++;
                $newFilename = $filename . $counter . '.' . $extension;
            }

            // Mover archivo a public/images
            $file->move(public_path('images'), $newFilename);

            // Guardar nombre archivo en los datos
            $data['foto'] = $newFilename;
        }

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        // Validar todos los campos menos la foto
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'regalo' => 'boolean',
            'activo' => 'boolean',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $originalName = $file->getClientOriginalName();
            $filename = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $counter = 0;
            $newFilename = $filename . '.' . $extension;

            while (file_exists(public_path('images/' . $newFilename))) {
                $counter++;
                $newFilename = $filename . $counter . '.' . $extension;
            }

            $file->move(public_path('images'), $newFilename);

            if (
                $producto->foto
                && $producto->foto !== $newFilename
                && file_exists(public_path('images/' . $producto->foto))
            ) {
                unlink(public_path('images/' . $producto->foto));
            }

            $data['foto'] = $newFilename;
        }

        $producto->update($data);

        return Redirect::route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }



    public function destroy($id): RedirectResponse
    {
        Producto::find($id)->delete();

        return Redirect::route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
    public function tienda(Request $request)
    {
        $productos = Producto::where('activo', true)->paginate();

        return view('store', compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }
    public function premios(Request $request)
    {
        $productos = Producto::where('regalo', true)->paginate();

        return view('producto.premios', compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }
    public function canjearProducto(Request $request): RedirectResponse
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
        ]);

        $producto = Producto::findOrFail($request->id_producto);
        $usuario = Auth::user();

        // Verificar si tiene suficientes puntos
        if ($usuario->puntos < $producto->precio_puntos) {
            return redirect()->back()->with('error', 'No tienes suficientes puntos para canjear este producto.');
        }

        // Restar puntos
        $usuario->puntos -= $producto->precio_puntos;
        $usuario->save();

        return redirect()->route('premios')->with('success', 'Producto canjeado correctamente. Se descontaron ' . $producto->precio_puntos . ' puntos.');
    }

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto_atributo;
use Illuminate\Http\Request;

class Producto_atributoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$producto_atributos = Producto_atributo::orderBy('id', 'desc')->paginate(10);

		return view('producto_atributos.index', compact('producto_atributos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('producto_atributos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$producto_atributo = new Producto_atributo();

		$producto_atributo->producto_atributo_alto = $request->input("producto_atributo_alto");
        $producto_atributo->producto_atributo_ancho = $request->input("producto_atributo_ancho");
        $producto_atributo->producto_atributo_profundidad = $request->input("producto_atributo_profundidad");
        $producto_atributo->producto_atributo_peso = $request->input("producto_atributo_peso");
        $producto_atributo->producto_atributo_default = $request->input("producto_atributo_default");
        $producto_atributo->producto_atributo_cantidad_minima = $request->input("producto_atributo_cantidad_minima");
        $producto_atributo->producto_atributo_cantidad_minima_alerta = $request->input("producto_atributo_cantidad_minima_alerta");
        $producto_atributo->fk_producto_id = $request->input("fk_producto_id");

		$producto_atributo->save();

		return redirect()->route('producto_atributos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$producto_atributo = Producto_atributo::findOrFail($id);

		return view('producto_atributos.show', compact('producto_atributo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$producto_atributo = Producto_atributo::findOrFail($id);

		return view('producto_atributos.edit', compact('producto_atributo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$producto_atributo = Producto_atributo::findOrFail($id);

		$producto_atributo->producto_atributo_alto = $request->input("producto_atributo_alto");
        $producto_atributo->producto_atributo_ancho = $request->input("producto_atributo_ancho");
        $producto_atributo->producto_atributo_profundidad = $request->input("producto_atributo_profundidad");
        $producto_atributo->producto_atributo_peso = $request->input("producto_atributo_peso");
        $producto_atributo->producto_atributo_default = $request->input("producto_atributo_default");
        $producto_atributo->producto_atributo_cantidad_minima = $request->input("producto_atributo_cantidad_minima");
        $producto_atributo->producto_atributo_cantidad_minima_alerta = $request->input("producto_atributo_cantidad_minima_alerta");
        $producto_atributo->fk_producto_id = $request->input("fk_producto_id");

		$producto_atributo->save();

		return redirect()->route('producto_atributos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$producto_atributo = Producto_atributo::findOrFail($id);
		$producto_atributo->delete();

		return redirect()->route('producto_atributos.index')->with('message', 'Item deleted successfully.');
	}

}

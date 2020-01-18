<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Caracteristica_producto;
use Illuminate\Http\Request;

class Caracteristica_productoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$caracteristica_productos = Caracteristica_producto::orderBy('id', 'desc')->paginate(10);

		return view('caracteristica_productos.index', compact('caracteristica_productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('caracteristica_productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$caracteristica_producto = new Caracteristica_producto();

		$caracteristica_producto->fk_producto_id = $request->input("fk_producto_id");
        $caracteristica_producto->fk_caracteristica_detalle_id = $request->input("fk_caracteristica_detalle_id");

		$caracteristica_producto->save();

		return redirect()->route('caracteristica_productos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$caracteristica_producto = Caracteristica_producto::findOrFail($id);

		return view('caracteristica_productos.show', compact('caracteristica_producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$caracteristica_producto = Caracteristica_producto::findOrFail($id);

		return view('caracteristica_productos.edit', compact('caracteristica_producto'));
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
		$caracteristica_producto = Caracteristica_producto::findOrFail($id);

		$caracteristica_producto->fk_producto_id = $request->input("fk_producto_id");
        $caracteristica_producto->fk_caracteristica_detalle_id = $request->input("fk_caracteristica_detalle_id");

		$caracteristica_producto->save();

		return redirect()->route('caracteristica_productos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$caracteristica_producto = Caracteristica_producto::findOrFail($id);
		$caracteristica_producto->delete();

		return redirect()->route('caracteristica_productos.index')->with('message', 'Item deleted successfully.');
	}

}

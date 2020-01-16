<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categoria_producto;
use Illuminate\Http\Request;

class Categoria_productoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categoria_productos = Categoria_producto::orderBy('id', 'desc')->paginate(10);

		return view('categoria_productos.index', compact('categoria_productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categoria_productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$categoria_producto = new Categoria_producto();

		$categoria_producto->categoria_producto_posicion = $request->input("categoria_producto_posicion");
        $categoria_producto->fk_categoria_id = $request->input("fk_categoria_id");
        $categoria_producto->fk_producto_id = $request->input("fk_producto_id");

		$categoria_producto->save();

		return redirect()->route('categoria_productos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoria_producto = Categoria_producto::findOrFail($id);

		return view('categoria_productos.show', compact('categoria_producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria_producto = Categoria_producto::findOrFail($id);

		return view('categoria_productos.edit', compact('categoria_producto'));
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
		$categoria_producto = Categoria_producto::findOrFail($id);

		$categoria_producto->categoria_producto_posicion = $request->input("categoria_producto_posicion");
        $categoria_producto->fk_categoria_id = $request->input("fk_categoria_id");
        $categoria_producto->fk_producto_id = $request->input("fk_producto_id");

		$categoria_producto->save();

		return redirect()->route('categoria_productos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria_producto = Categoria_producto::findOrFail($id);
		$categoria_producto->delete();

		return redirect()->route('categoria_productos.index')->with('message', 'Item deleted successfully.');
	}

}

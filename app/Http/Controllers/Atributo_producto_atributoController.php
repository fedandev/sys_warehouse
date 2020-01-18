<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Atributo_producto_atributo;
use Illuminate\Http\Request;

class Atributo_producto_atributoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$atributo_producto_atributos = Atributo_producto_atributo::orderBy('id', 'desc')->paginate(10);

		return view('atributo_producto_atributos.index', compact('atributo_producto_atributos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('atributo_producto_atributos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$atributo_producto_atributo = new Atributo_producto_atributo();

		$atributo_producto_atributo->fk_atributo_id = $request->input("fk_atributo_id");
        $atributo_producto_atributo->fk_producto_atributo = $request->input("fk_producto_atributo");

		$atributo_producto_atributo->save();

		return redirect()->route('atributo_producto_atributos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$atributo_producto_atributo = Atributo_producto_atributo::findOrFail($id);

		return view('atributo_producto_atributos.show', compact('atributo_producto_atributo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$atributo_producto_atributo = Atributo_producto_atributo::findOrFail($id);

		return view('atributo_producto_atributos.edit', compact('atributo_producto_atributo'));
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
		$atributo_producto_atributo = Atributo_producto_atributo::findOrFail($id);

		$atributo_producto_atributo->fk_atributo_id = $request->input("fk_atributo_id");
        $atributo_producto_atributo->fk_producto_atributo = $request->input("fk_producto_atributo");

		$atributo_producto_atributo->save();

		return redirect()->route('atributo_producto_atributos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$atributo_producto_atributo = Atributo_producto_atributo::findOrFail($id);
		$atributo_producto_atributo->delete();

		return redirect()->route('atributo_producto_atributos.index')->with('message', 'Item deleted successfully.');
	}

}

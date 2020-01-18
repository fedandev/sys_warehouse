<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grupo_atributo;
use Illuminate\Http\Request;

class Grupo_atributoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$grupo_atributos = Grupo_atributo::orderBy('id', 'desc')->paginate(10);

		return view('grupo_atributos.index', compact('grupo_atributos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('grupo_atributos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$grupo_atributo = new Grupo_atributo();

		$grupo_atributo->grupo_atributo_nombre = $request->input("grupo_atributo_nombre");
        $grupo_atributo->grupo_atributo_nombre_publico = $request->input("grupo_atributo_nombre_publico");

		$grupo_atributo->save();

		return redirect()->route('grupo_atributos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$grupo_atributo = Grupo_atributo::findOrFail($id);

		return view('grupo_atributos.show', compact('grupo_atributo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$grupo_atributo = Grupo_atributo::findOrFail($id);

		return view('grupo_atributos.edit', compact('grupo_atributo'));
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
		$grupo_atributo = Grupo_atributo::findOrFail($id);

		$grupo_atributo->grupo_atributo_nombre = $request->input("grupo_atributo_nombre");
        $grupo_atributo->grupo_atributo_nombre_publico = $request->input("grupo_atributo_nombre_publico");

		$grupo_atributo->save();

		return redirect()->route('grupo_atributos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$grupo_atributo = Grupo_atributo::findOrFail($id);
		$grupo_atributo->delete();

		return redirect()->route('grupo_atributos.index')->with('message', 'Item deleted successfully.');
	}

}

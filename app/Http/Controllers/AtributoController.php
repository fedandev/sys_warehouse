<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Atributo;
use Illuminate\Http\Request;

class AtributoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$atributos = Atributo::orderBy('id', 'desc')->paginate(10);

		return view('atributos.index', compact('atributos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('atributos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$atributo = new Atributo();

		$atributo->atributo_color = $request->input("atributo_color");
        $atributo->atributo_posicion = $request->input("atributo_posicion");
        $atributo->atributo_nombre = $request->input("atributo_nombre");
        $atributo->fk_grupo_atributo_id = $request->input("fk_grupo_atributo_id");

		$atributo->save();

		return redirect()->route('atributos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$atributo = Atributo::findOrFail($id);

		return view('atributos.show', compact('atributo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$atributo = Atributo::findOrFail($id);

		return view('atributos.edit', compact('atributo'));
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
		$atributo = Atributo::findOrFail($id);

		$atributo->atributo_color = $request->input("atributo_color");
        $atributo->atributo_posicion = $request->input("atributo_posicion");
        $atributo->atributo_nombre = $request->input("atributo_nombre");
        //$atributo->fk_grupo_atributo_id = $request->input("fk_grupo_atributo_id");

		$atributo->save();

		return redirect()->route('atributos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$atributo = Atributo::findOrFail($id);
		$atributo->delete();

		return redirect()->route('atributos.index')->with('message', 'Item deleted successfully.');
	}

}

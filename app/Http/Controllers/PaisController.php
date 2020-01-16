<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pais;
use Illuminate\Http\Request;
use Redirect,Response;

class PaisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paises = Pais::orderBy('id', 'desc')->paginate(10);

		return view('pais.index', compact('paises'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pais.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$pais = new Pais();

		$pais->pais_nombre = $request->input("pais_nombre");

		$pais->save();

		return redirect()->route('pais.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pais = Pais::findOrFail($id);

		return view('pais.show', compact('pais'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pais = Pais::findOrFail($id);

		return view('pais.edit', compact('pais'));
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
		$pais = Pais::findOrFail($id);

		$pais->pais_nombre = $request->input("pais_nombre");

		$pais->save();

		return redirect()->route('pais.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		$pais = Pais::findOrFail($id);
		$pais->delete();
        if($request->isJson()){
			return response()->json([
                'success' => 'Record has been deleted successfully!'
        	]);
		}else{
			return redirect()->route('ajustes.index')->with('info', 'Eliminado exitosamente.');
		}
	}

}

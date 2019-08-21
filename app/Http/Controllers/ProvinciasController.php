<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Provincias;
use Illuminate\Http\Request;

class ProvinciasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provincias = Provincias::orderBy('id', 'desc')->paginate(10);

		return view('provincias.index', compact('provincias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('provincias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$provincium = new Provincias();

		$provincium->provincia_nombre = $request->input("provincia_nombre");
        $provincium->fk_pais_id = $request->input("fk_pais_id");

		$provincium->save();

		return redirect()->route('provincias.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$provincium = Provincias::findOrFail($id);

		return view('provincias.show', compact('provincium'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$provincium = Provincias::findOrFail($id);

		return view('provincias.edit', compact('provincium'));
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
		$provincium = Provincias::findOrFail($id);

		$provincium->provincia_nombre = $request->input("provincia_nombre");
        $provincium->fk_pais_id = $request->input("fk_pais_id");

		$provincium->save();

		return redirect()->route('provincias.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$provincium = Provincias::findOrFail($id);
		$provincium->delete();

		return redirect()->route('provincias.index')->with('message', 'Item deleted successfully.');
	}

}

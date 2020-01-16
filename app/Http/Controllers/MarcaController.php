<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$marcas = Marca::orderBy('id', 'desc')->paginate(10);

		return view('marcas.index', compact('marcas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('marcas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$marca = new Marca();

		$marca->marca_nombre = $request->input("marca_nombre");

		$marca->save();

		return redirect()->route('marcas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$marca = Marca::findOrFail($id);

		return view('marcas.show', compact('marca'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$marca = Marca::findOrFail($id);

		return view('marcas.edit', compact('marca'));
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
		$marca = Marca::findOrFail($id);

		$marca->marca_nombre = $request->input("marca_nombre");

		$marca->save();

		return redirect()->route('marcas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$marca = Marca::findOrFail($id);
		$marca->delete();

		return redirect()->route('marcas.index')->with('message', 'Item deleted successfully.');
	}

    public function getMarcas(){
        $cat = DB::table('marcas')->select('id', 'marca_nombre')->get();
        return response()->json($cat);
    }
}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaracteristicaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$caracteristicas = Caracteristica::orderBy('id', 'desc')->paginate(10);

		return view('caracteristicas.index', compact('caracteristicas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('caracteristicas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$caracteristica = new Caracteristica();

		$caracteristica->caracteristica_nombre = $request->input("caracteristica_nombre");

		$caracteristica->save();

		return redirect()->route('grupos_caracteristicas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$caracteristica = Caracteristica::findOrFail($id);

		return view('caracteristicas.show', compact('caracteristica'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$caracteristica = Caracteristica::findOrFail($id);

		return view('caracteristicas.edit', compact('caracteristica'));
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
		$caracteristica = Caracteristica::findOrFail($id);

		$caracteristica->caracteristica_nombre = $request->input("caracteristica_nombre");

		$caracteristica->save();

		return redirect()->route('grupos_caracteristicas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$caracteristica = Caracteristica::findOrFail($id);
		$caracteristica->delete();

		return redirect()->route('grupos_caracteristicas.index')->with('message', 'Item deleted successfully.');
	}
    
    public function getCaracteristicas(Request $request){
        //if($request->ajax()){
			$cat = DB::table('caracteristicas')->select('id', 'caracteristica_nombre')->get();
			return response()->json($cat);
		//}
    }
}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Caracteristicas_detalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Caracteristicas_detalleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$caracteristicas_detalles = Caracteristicas_detalle::orderBy('id', 'desc')->paginate(10);

		return view('caracteristicas_detalles.index', compact('caracteristicas_detalles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('caracteristicas_detalles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$caracteristicas_detalle = new Caracteristicas_detalle();

		$caracteristicas_detalle->caracteristica_detalle_nombre = $request->input("caracteristica_detalle_nombre");
        $caracteristicas_detalle->fk_caracteristica_id = $request->input("fk_caracteristica_id");

		$caracteristicas_detalle->save();

		return redirect()->route('caracteristicas_detalles.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$caracteristicas_detalle = Caracteristicas_detalle::findOrFail($id);

		return view('caracteristicas_detalles.show', compact('caracteristicas_detalle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$caracteristicas_detalle = Caracteristicas_detalle::findOrFail($id);
    
		return view('caracteristicas_detalles.edit', compact('caracteristicas_detalle'));
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
		$caracteristicas_detalle = Caracteristicas_detalle::findOrFail($id);

		$caracteristicas_detalle->caracteristica_detalle_nombre = $request->input("caracteristica_detalle_nombre");
    //$caracteristicas_detalle->fk_caracteristica_id = $request->input("fk_caracteristica_id");

		$caracteristicas_detalle->save();

		return redirect()->route('caracteristicas_detalles.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$caracteristicas_detalle = Caracteristicas_detalle::findOrFail($id);
		$caracteristicas_detalle->delete();

		return redirect()->route('caracteristicas_detalles.index')->with('message', 'Item deleted successfully.');
	}

    public function getDetalleCaracteristica(Request $request, $id){
        //if($request->ajax()){
			$cat = DB::table('caracteristicas_detalles')->where('fk_caracteristica_id', $id)->select('id', 'caracteristica_detalle_nombre')->get();
			return response()->json($cat);
		//}
    }
    
}

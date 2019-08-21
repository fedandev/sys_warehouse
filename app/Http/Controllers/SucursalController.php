<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sucursals = Sucursal::orderBy('id', 'desc')->paginate(10);

		return view('sucursals.index', compact('sucursals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sucursals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$sucursal = new Sucursal();

		$sucursal->sucursal_nombre = $request->input("sucursal_nombre");
        $sucursal->fk_localidad_id = $request->input("fk_localidad_id");

		$sucursal->save();

		return redirect()->route('sucursals.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sucursal = Sucursal::findOrFail($id);

		return view('sucursals.show', compact('sucursal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sucursal = Sucursal::findOrFail($id);

		return view('sucursals.edit', compact('sucursal'));
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
		$sucursal = Sucursal::findOrFail($id);

		$sucursal->sucursal_nombre = $request->input("sucursal_nombre");
        $sucursal->fk_localidad_id = $request->input("fk_localidad_id");

		$sucursal->save();

		return redirect()->route('sucursals.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sucursal = Sucursal::findOrFail($id);
		$sucursal->delete();

		return redirect()->route('sucursals.index')->with('message', 'Item deleted successfully.');
	}

}

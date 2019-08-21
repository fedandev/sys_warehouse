<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pais = Pais::orderBy('id', 'desc')->paginate(10);

		return view('pais.index', compact('pais'));
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
		$pai = new Pais();

		$pai->pais_nombre = $request->input("pais_nombre");

		$pai->save();

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
		$pai = Pais::findOrFail($id);

		return view('pais.show', compact('pai'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pai = Pais::findOrFail($id);

		return view('pais.edit', compact('pai'));
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
		$pai = Pais::findOrFail($id);

		$pai->pais_nombre = $request->input("pais_nombre");

		$pai->save();

		return redirect()->route('pais.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pai = Pais::findOrFail($id);
		$pai->delete();

		return redirect()->route('pais.index')->with('message', 'Item deleted successfully.');
	}

}

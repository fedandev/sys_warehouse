<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rubros = Rubro::orderBy('id', 'desc')->paginate(10);

		return view('rubros.index', compact('rubros'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('rubros.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$rubro = new Rubro();

		$rubro->rubro_nombre = $request->input("rubro_nombre");
        $rubro->rubro_descripcion = $request->input("rubro_descripcion");

		$rubro->save();

		return redirect()->route('rubros.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rubro = Rubro::findOrFail($id);

		return view('rubros.show', compact('rubro'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rubro = Rubro::findOrFail($id);

		return view('rubros.edit', compact('rubro'));
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
		$rubro = Rubro::findOrFail($id);

		$rubro->rubro_nombre = $request->input("rubro_nombre");
        $rubro->rubro_descripcion = $request->input("rubro_descripcion");

		$rubro->save();

		return redirect()->route('rubros.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rubro = Rubro::findOrFail($id);
		$rubro->delete();

		return redirect()->route('rubros.index')->with('message', 'Item deleted successfully.');
	}

}

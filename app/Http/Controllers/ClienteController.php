<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::orderBy('id', 'desc')->paginate(10);

		return view('clientes.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$cliente = new Cliente();

		$cliente->cliente_RUC = $request->input("cliente_RUC");
        $cliente->cliente_cedula = $request->input("cliente_cedula");
        $cliente->cliente_nombre = $request->input("cliente_nombre");
        $cliente->cliente_apellido = $request->input("cliente_apellido");
        $cliente->cliente_direccion = $request->input("cliente_direccion");
        $cliente->cliente_telefono1 = $request->input("cliente_telefono1");
        $cliente->cliente_telefono2 = $request->input("cliente_telefono2");
        $cliente->cliente_calle = $request->input("cliente_calle");
        $cliente->fk_localidad_id = $request->input("fk_localidad_id");

		$cliente->save();

		return redirect()->route('clientes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cliente = Cliente::findOrFail($id);

		return view('clientes.show', compact('cliente'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cliente = Cliente::findOrFail($id);

		return view('clientes.edit', compact('cliente'));
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
		$cliente = Cliente::findOrFail($id);

		$cliente->cliente_RUC = $request->input("cliente_RUC");
        $cliente->cliente_cedula = $request->input("cliente_cedula");
        $cliente->cliente_nombre = $request->input("cliente_nombre");
        $cliente->cliente_apellido = $request->input("cliente_apellido");
        $cliente->cliente_direccion = $request->input("cliente_direccion");
        $cliente->cliente_telefono1 = $request->input("cliente_telefono1");
        $cliente->cliente_telefono2 = $request->input("cliente_telefono2");
        $cliente->cliente_calle = $request->input("cliente_calle");
        $cliente->fk_localidad_id = $request->input("fk_localidad_id");

		$cliente->save();

		return redirect()->route('clientes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = Cliente::findOrFail($id);
		$cliente->delete();

		return redirect()->route('clientes.index')->with('message', 'Item deleted successfully.');
	}

}

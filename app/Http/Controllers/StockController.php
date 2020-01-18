<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stocks = Stock::orderBy('id', 'desc')->paginate(10);

		return view('stocks.index', compact('stocks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('stocks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$stock = new Stock();

		$stock->stock_cantidad = $request->input("stock_cantidad");
        $stock->fk_producto_id = $request->input("fk_producto_id");
        $stock->fk_sucursals_id = $request->input("fk_sucursals_id");

		$stock->save();

		return redirect()->route('stocks.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$stock = Stock::findOrFail($id);

		return view('stocks.show', compact('stock'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stock = Stock::findOrFail($id);

		return view('stocks.edit', compact('stock'));
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
		$stock = Stock::findOrFail($id);

		$stock->stock_cantidad = $request->input("stock_cantidad");
        $stock->fk_producto_id = $request->input("fk_producto_id");
        $stock->fk_sucursals_id = $request->input("fk_sucursals_id");

		$stock->save();

		return redirect()->route('stocks.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$stock = Stock::findOrFail($id);
		$stock->delete();

		return redirect()->route('stocks.index')->with('message', 'Item deleted successfully.');
	}

}

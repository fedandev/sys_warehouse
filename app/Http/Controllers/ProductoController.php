<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productos = Producto::orderBy('id', 'desc')->paginate(10);

		return view('productos.index', compact('productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$producto = new Producto();

		$producto->producto_codigo_interno = $request->input("producto_codigo_interno");
        $producto->producto_codigo_proveedor = $request->input("producto_codigo_proveedor");
        $producto->producto_codigo_barras = $request->input("producto_codigo_barras");
        $producto->producto_imagen = $request->input("producto_imagen");
        $producto->producto_descripcion = $request->input("producto_descripcion");
        $producto->producto_unidad_x_bulto = $request->input("producto_unidad_x_bulto");
        $producto->producto_precio_venta = $request->input("producto_precio_venta");
        $producto->producto_precio_costo = $request->input("producto_precio_costo");
        $producto->fk_marca_id = $request->input("fk_marca_id");
        $producto->fk_proveedor_cliente_id = $request->input("fk_proveedor_cliente_id");
        $producto->fk_rubro_id = $request->input("fk_rubro_id");
        $producto->fk_talla_id = $request->input("fk_talla_id");
        $producto->fk_color_id = $request->input("fk_color_id");

		$producto->save();

		return redirect()->route('productos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$producto = Producto::findOrFail($id);

		return view('productos.show', compact('producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$producto = Producto::findOrFail($id);

		return view('productos.edit', compact('producto'));
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
		$producto = Producto::findOrFail($id);

		$producto->producto_codigo_interno = $request->input("producto_codigo_interno");
        $producto->producto_codigo_proveedor = $request->input("producto_codigo_proveedor");
        $producto->producto_codigo_barras = $request->input("producto_codigo_barras");
        $producto->producto_imagen = $request->input("producto_imagen");
        $producto->producto_descripcion = $request->input("producto_descripcion");
        $producto->producto_unidad_x_bulto = $request->input("producto_unidad_x_bulto");
        $producto->producto_precio_venta = $request->input("producto_precio_venta");
        $producto->producto_precio_costo = $request->input("producto_precio_costo");
        $producto->fk_marca_id = $request->input("fk_marca_id");
        $producto->fk_proveedor_cliente_id = $request->input("fk_proveedor_cliente_id");
        $producto->fk_rubro_id = $request->input("fk_rubro_id");
        $producto->fk_talla_id = $request->input("fk_talla_id");
        $producto->fk_color_id = $request->input("fk_color_id");

		$producto->save();

		return redirect()->route('productos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$producto = Producto::findOrFail($id);
		$producto->delete();

		return redirect()->route('productos.index')->with('message', 'Item deleted successfully.');
	}

}

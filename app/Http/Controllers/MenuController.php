<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menus = Menu::orderBy('id', 'desc')->paginate(10);

		return view('menus.index', compact('menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$menu = new Menu();

		$menu->menu_descripcion = $request->input("menu_descripcion");
        $menu->menu_posicion = $request->input("menu_posicion");
        $menu->menu_habilitado = $request->input("menu_habilitado");
        $menu->menu_url = $request->input("menu_url");
        $menu->menu_icono = $request->input("menu_icono");
        $menu->menu_formulario = $request->input("menu_formulario");
        $menu->menu_padre_id = $request->input("menu_padre_id");

		$menu->save();

		return redirect()->route('menus.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$menu = Menu::findOrFail($id);

		return view('menus.show', compact('menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu = Menu::findOrFail($id);

		return view('menus.edit', compact('menu'));
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
		$menu = Menu::findOrFail($id);

		$menu->menu_descripcion = $request->input("menu_descripcion");
        $menu->menu_posicion = $request->input("menu_posicion");
        $menu->menu_habilitado = $request->input("menu_habilitado");
        $menu->menu_url = $request->input("menu_url");
        $menu->menu_icono = $request->input("menu_icono");
        $menu->menu_formulario = $request->input("menu_formulario");
        $menu->menu_padre_id = $request->input("menu_padre_id");

		$menu->save();

		return redirect()->route('menus.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request,$id)
	{
		$menu = Menu::findOrFail($id);
		$menu->delete();
		if($request->isJson()){
			return response()->json([
            'success' => 'Registro eliminado correctamente.'
        	]);
		}else{
			return redirect()->route('menus.index')->with('message', 'Item deleted successfully.');
		}
		
	}

}

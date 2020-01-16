<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = Categoria::where('categoria_padre','0')->orderBy('id', 'desc')->paginate(10);
    
		return view('categorias.index', compact('categorias'));
	}
  
  public function getHijos($id){
    $categorias = Categoria::where('categoria_padre',$id)->orderBy('id', 'desc')->paginate(10);
    $cat_seleccionada = Categoria::where('id',$id)->first();
    
		return view('categorias.index', compact('categorias', 'cat_seleccionada'));
  }
  
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias_first = Categoria::where('categoria_activo','=','1')->orderBy('id', 'asc')->orderBy('categoria_posicion', 'asc')->get();	
		
		$categorias_array = $categorias_first->toArray();
		
		$categorias = $this->makeTree($categorias_array,0);	
		//dd($categorias);
		return view('categorias.create', compact('categorias'));
	}
	
	public function makeTree($array, $parent) {
			
		$return = [];
		foreach ($array as $key => $value) {
			if ($value['categoria_padre'] == $parent) {
				$return[$value['id']] = [
					'categoria_id' => $value['id'],
					'categoria_nombre' => $value['categoria_nombre'],
					'categoria_posicion' => $value['categoria_posicion'],
				];
				$childrens = false;
				foreach ($array as $search) {
					if ($search['categoria_padre'] == $value['id']) {
						$childrens = true;
					}
				}
				if ($childrens === true) {
					$return[$value['id']]['children'] = $this->makeTree($array, $value['id']);
				}else{
					$return[$value['id']]['children'] = [];
				}
			}
		}
		return $return;
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$categoria = new Categoria();

		$categoria->categoria_padre = $request->input("categoria_padre");
		$categoria->categoria_activo = $request->input("categoria_activo");
		$categoria->categoria_nombre = $request->input("categoria_nombre");
    $categoria->categoria_descripcion = $request->input("categoria_descripcion");

		$categoria->save();

		return redirect()->route('categorias.index')->with('message', 'Item created successfully.');
	}
	
	
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = Categoria::findOrFail($id);

		return view('categorias.show', compact('categoria'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = Categoria::findOrFail($id);
		//$categorias = Categoria::where('categoria_activo',"1")->orderBy('id', 'desc');	
    
    $categorias_first = Categoria::where('categoria_activo','=','1')->orderBy('id', 'asc')->orderBy('categoria_posicion', 'asc')->get();	
		
		$categorias_array = $categorias_first->toArray();
		
		$categorias = $this->makeTree($categorias_array,0);	
    
		return view('categorias.edit', compact('categoria', 'categorias'));
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
		$categoria = Categoria::findOrFail($id);

		$categoria->categoria_padre = $request->input("categoria_padre");
		$categoria->categoria_activo = $request->input("categoria_activo");
		//$categoria->categoria_posicion = $request->input("categoria_posicion");
		$categoria->categoria_nombre = $request->input("categoria_nombre");
    $categoria->categoria_descripcion = $request->input("categoria_descripcion");

		$categoria->save();

		return redirect()->route('categorias.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = Categoria::findOrFail($id);
		$categoria->delete();

		return redirect()->route('categorias.index')->with('message', 'Item deleted successfully.');
	}
}
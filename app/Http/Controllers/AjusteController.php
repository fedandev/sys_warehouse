<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ajuste;
use Illuminate\Http\Request;
use Redirect,Response;

class AjusteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
        $ajustes = Ajuste::get();   
        
		return view('ajustes.index', compact('ajustes'));
	}
    
    public function getData()
	{		
        $ajustes = Ajuste::get();
        $ajustes2 = '{"data":'.json_encode($ajustes).'}';
        return $ajustes2;		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ajustes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
            
		$this->validate($request, [
            'ajuste_nombre' => 'required|string|unique:ajustes|max:191',
            'ajuste_valor' => 'required|string|max:191',
        ]);      
        
        $ajuste = Ajuste::create($request->all());
        
        //return Response::json($ajuste);
		return redirect()->secure(route('ajustes.show', $ajuste->id))->with('info', 'Creado exitosamente.');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ajuste = Ajuste::findOrFail($id);

		return view('ajustes.show', compact('ajuste'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ajuste = Ajuste::findOrFail($id);

		return view('ajustes.edit', compact('ajuste'));
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
		$ajuste = Ajuste::findOrFail($id);

		$this->validate($request, [
            'ajuste_nombre' => 'required|string|max:255',
            'ajuste_valor' => 'required|string|max:255',
        ]);
		$ajuste->update($request->all());
        //return Response::json($ajuste);
		return redirect()->route('ajustes.show', $ajuste->id)->with('info', 'Actualizado exitosamente.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		$ajuste = Ajuste::findOrFail($id);
		$ajuste->delete();
		if($request->isJson()){
			return response()->json([
            'success' => 'Record has been deleted successfully!'
        	]);
		}else{
			return redirect()->route('ajustes.index')->with('info', 'Eliminado exitosamente.');
		}
	}
}

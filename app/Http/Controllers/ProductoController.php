<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Categoria;
use App\Grupo_atributo;
use App\Producto_atributo;
use App\Producto_atributo_combinacion;
use App\Atributo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Log;
use DB;

class ProductoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$productos = Producto::orderBy('id', 'desc')->paginate(10);

		return view('productos.index', compact('productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
        $categorias_first = Categoria::where('categoria_activo','=','1')->orderBy('id', 'asc')->orderBy('categoria_posicion', 'asc')->get();	
		$grupo_atributos = Grupo_atributo::all();
        
        
		$categorias_array = $categorias_first->toArray();
		
		$categorias = $this->makeTree($categorias_array,0);	
		return view('productos.create', compact('categorias','grupo_atributos'));
	}

    public function makeTree($array, $parent){	
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
	public function store(Request $request){
		$producto = new Producto();
    
		$producto->producto_codigo_interno = $request->input("producto_codigo_interno");
        $producto->producto_codigo_barras = $request->input("producto_codigo_barras");
        $producto->producto_imagen = $request->input("producto_imagen");
        $producto->producto_descripcion = $request->input("producto_descripcion");
        $producto->producto_unidad_x_bulto = $request->input("producto_unidad_x_bulto");
        $producto->producto_precio_venta = $request->input("producto_precio_venta");
        $producto->producto_cantidad_minima = $request->input("producto_cantidad_minima");
        $producto->producto_cantidad_minima_web = $request->input("producto_cantidad_minima_web");
        $producto->producto_activo = $request->input("producto_activo");
        $producto->producto_altura = $request->input("producto_altura");
        $producto->producto_ancho = $request->input("producto_ancho");
        $producto->producto_profundidad = $request->input("producto_profundidad");
        $producto->producto_peso = $request->input("producto_peso");
        $producto->producto_condicion = $request->input("producto_condicion");
        $producto->producto_mostrar_precio = $request->input("producto_mostrar_precio");
        $producto->producto_simple = $request->input("producto_simple");
        $producto->producto_estado = $request->input("producto_estado");
        $producto->fk_marca_id = $request->input("fk_marca_id");

		$producto->save();

		return redirect()->route('productos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$producto = Producto::findOrFail($id);

		return view('productos.show', compact('producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
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
	public function update(Request $request, $id){
		$producto = Producto::findOrFail($id);

		$producto->producto_codigo_interno = $request->input("producto_codigo_interno");
        $producto->producto_codigo_barras = $request->input("producto_codigo_barras");
        $producto->producto_imagen = $request->input("producto_imagen");
        $producto->producto_descripcion = $request->input("producto_descripcion");
        $producto->producto_unidad_x_bulto = $request->input("producto_unidad_x_bulto");
        $producto->producto_precio_venta = $request->input("producto_precio_venta");
        $producto->producto_cantidad_minima = $request->input("producto_cantidad_minima");
        $producto->producto_cantidad_minima_web = $request->input("producto_cantidad_minima_web");
        $producto->producto_activo = $request->input("producto_activo");
        $producto->producto_altura = $request->input("producto_altura");
        $producto->producto_ancho = $request->input("producto_ancho");
        $producto->producto_profundidad = $request->input("producto_profundidad");
        $producto->producto_peso = $request->input("producto_peso");
        $producto->producto_condicion = $request->input("producto_condicion");
        $producto->producto_mostrar_precio = $request->input("producto_mostrar_precio");
        $producto->producto_simple = $request->input("producto_simple");
        $producto->producto_estado = $request->input("producto_estado");
        $producto->fk_marca_id = $request->input("fk_marca_id");
        
        
		$producto->save();

		return redirect()->route('productos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$producto = Producto::findOrFail($id);
		$producto->delete();

		return redirect()->route('productos.index')->with('message', 'Item deleted successfully.');
	}

    public function CreoCombinaciones(Request $request){
        //Creo el producto
        //$imagen = $request->producto_imagen;
        $nombre = $request->producto_nombre;
        $descripcion = $request->producto_descripcion;
        $etiquetas = $request->etiquetas;
        $caracteristicas = $request->caracteristicas;
        
        
        /*$marca = $request->fk_marca_id;
        $cantidad = $request->producto_cantidad;
        $cantidad_minima = $request->producto_cantidad_minima;
        $ancho = $request->producto_ancho;
        $alto = $request->producto_alto;
        $profundidad = $request->producto_profundidad;
        $peso = $request->producto_peso;
        $condicion = $request->producto_condicion;
        $precio = $request->producto_precio_venta;*/
        
        //Creo el producto y si esta creado lo actualizo
        $producto = Producto::updateOrCreate([
            'producto_nombre' => $nombre
        ], [
            'producto_descripcion' => $descripcion,
            'producto_simple' => 'No', 
            'producto_estado' => '0'
        ]);
                
        $ArrayAtributos = [];
        
        //Busco todos los atributos seleccionados
        foreach($etiquetas as $etiqueta){
            $atributo = Atributo::where('id',$etiqueta)->first();
            array_push($ArrayAtributos, $atributo);
        }
        
        $collectAtributos = collect($ArrayAtributos);
		
        $groupedAtributos = $collectAtributos->groupBy('fk_grupo_atributo_id');
        
        $groupedAtributos->toArray();
        
        $nombreAtributo = array();
        $x=0;
        foreach($groupedAtributos as $atributos){
			$p = 0;
            foreach($atributos as $nombreAtri){
                $nombreAtributo[$x]['atributo_nombre'][$p] = $nombreAtri->atributo_nombre;
				$p++;
            }
            $x++;
        }
        
        $collectnombreAtributo = $nombreAtributo;
		$cantidadAtributos = count($collectnombreAtributo);

		switch ($cantidadAtributos) {
			case 1:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']); 
				$combinaciones = $collection;
				return response()->json($collection);
				break;
			case 2:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']); 
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre']);
				break;
			case 3:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre']);
				break;
			case 4:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre']);
				break;
			case 5:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre'], $collectnombreAtributo[4]									['atributo_nombre']);
				break;
			case 6:
			 	$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre'], $collectnombreAtributo[4]									['atributo_nombre'], $collectnombreAtributo[5]['atributo_nombre']);
				break;
			case 7:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre'], $collectnombreAtributo[4]									['atributo_nombre'], $collectnombreAtributo[5]['atributo_nombre'], $collectnombreAtributo[6]['atributo_nombre']);
				break;
			case 8:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre'], $collectnombreAtributo[4]									['atributo_nombre'], $collectnombreAtributo[5]['atributo_nombre'], $collectnombreAtributo[6]['atributo_nombre'], $collectnombreAtributo[7]['atributo_nombre']);
				break;
			case 9:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre'], $collectnombreAtributo[4]									['atributo_nombre'], $collectnombreAtributo[5]['atributo_nombre'], $collectnombreAtributo[6]['atributo_nombre'], $collectnombreAtributo[7]['atributo_nombre'], $collectnombreAtributo[8]									['atributo_nombre']);
				break;
			case 10:
				$collection = collect($collectnombreAtributo[0]['atributo_nombre']);
				$combinaciones = $collection->crossJoin($collectnombreAtributo[1]['atributo_nombre'], $collectnombreAtributo[2]['atributo_nombre'], $collectnombreAtributo[3]['atributo_nombre'], $collectnombreAtributo[4]									['atributo_nombre'], $collectnombreAtributo[5]['atributo_nombre'], $collectnombreAtributo[6]['atributo_nombre'], $collectnombreAtributo[7]['atributo_nombre'], $collectnombreAtributo[8]								['atributo_nombre'], $collectnombreAtributo[9]['atributo_nombre']);
				break;	
		}
		
        
        $combinaciones->all();
        
        //Creo la combinación
		$arrayCombinacionesId = array();
        foreach($combinaciones as $combinacion){
			         
			foreach($combinacion as $atributo){
			    
				$atributoAx = Atributo::where('atributo_nombre',$atributo)->first();
				$id = $atributoAx->id;
				array_push($arrayCombinacionesId, $id);
				
				///VALIDAR SI YA EXISTE LA COMBINACION PARA EL PRODUCTO_ATRIBUTO
				
			}			
			sort($arrayCombinacionesId);
			
			
// 			$prod_atr_comb = Producto_atributo_combinacion::with(['Producto_atributo' => function($query)
// 				{
// 					$query->where('fk_producto_id', '=', $producto->id);

// 			}])->get();
			
			$producto_atributos = DB::select('select a.* from producto_atributo_combinacion a, producto_atributos b where b.fk_producto_id = ? and a.producto_atributos_id = b.id ', [$producto->id]);
			$producto_atributos =  collect($producto_atributos);
			
			$ok = 'S';
			foreach($producto_atributos->groupBy('producto_atributos_id') as $pa){
				$ax_arrayCombinacionesId = array();
				foreach($pa as $p){
					array_push($ax_arrayCombinacionesId, $p->atributo_id);				
				}
				sort($ax_arrayCombinacionesId);
				
				//comparo con el array anterior
				if($ax_arrayCombinacionesId==$arrayCombinacionesId){
					$ok = 'N';
				}
			}

			
			if($ok=='S'){
				$producto_atributo = new Producto_atributo();			
				$producto_atributo->fk_producto_id = $producto->id;
				$producto_atributo->save();				
		
				foreach($combinacion as $atributo){			    
					$atributoAx = Atributo::where('atributo_nombre',$atributo)->first();
					DB::insert('insert into producto_atributo_combinacion (producto_atributos_id, atributo_id) values (?, ?)', [$producto_atributo->id, $atributoAx->id]);
					///VALIDAR SI YA EXISTE LA COMBINACION PARA EL PRODUCTO_ATRIBUTO				
				}	
			}
			
			

        }
		
// 		$producto_atributos = DB::select('select a.* from producto_atributo_combinacion a, producto_atributos b where b.fk_producto_id = ? and a.producto_atributos_id = b.id ', [$producto->id]);
// 		$producto_atributos = collect($producto_atributos);
		
		
// 		$arrayFinal = array();
// 		$x = 0;
// 		foreach($producto_atributos as $pa){
// 			array_push($ax_arrayCombinacionesId, $p->atributo_id);		
// 			$nombreAtributo[$x]['producto_atributos_id']= $pa->producto_atributos_id;
// 			$x++;
// 	    }	
// 		return response()->json($producto_atributos);
        
       
       
        return response()->json($combinaciones);
        
    }
    
    //Uso de UpdateOrCreate
    /*$flight = App\Flight::updateOrCreate(
        ['departure' => 'Oakland', 'destination' => 'San Diego'],
        ['price' => 99, 'discounted' => 1]
    );*/
  
}

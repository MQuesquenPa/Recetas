<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
        
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('recetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('categoria_receta')->get()->dd(); //mostrar SQL SELECT en arreglo dd detiene la ejecucion :v
        
        
        
        $categorias = DB::table('categoria_receta')->get()->pluck('nombre', 'id'); //mostrar SQL SELECT con campos especificos(pluck)

        return view('recetas.create')->with('categorias', $categorias);  

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['imagen']->store('upload-recetas', 'public'));
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen'=>'required|image',
            'categoria'=> 'required',
            
        ]);

            //obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');
            //Resize de la image //uso con libreria FIT

            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(1200,550);
            $img->save();

            //almacenar en la bd sin modelos 
        DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'preparacion' =>$data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen'=> $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id'=>$data['categoria'],
            //'imagen'=>'required|image|size:1000',
            
            ]);
        //redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
     //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}

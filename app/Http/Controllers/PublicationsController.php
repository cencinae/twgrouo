<?php

namespace App\Http\Controllers;
use App\Publication;
use Validator;

use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $p = Publication::all();
        return view('publications/index')->with('pbl', $p);
    }
    public function create()
    {
        return view('publications/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Mal, Es necesario completar la información');
        }

            try {
                
                $n = new Publication;
                $n->title =  $request->input('titulo');
                $n->content =  $request->input('contenido');
                $n->user_id = Controller::getLogeado()->id;
                $n->save();

            } catch (\Exception $e) {
                return back()->with('error', 'No fue posible ingresar la información');
            }

     
            return back()->with('success', 'Bien, Publicación guardada.');
    }

    public function destroy($id)
	{
		$n = Publication::find($id);
		if(is_null($n))
		{
            return back()->with('error', 'No fue posible eliminar la Publicación');
		}
		$n->delete();  
        return back()->with('success', 'Bien, Publicación eliminada.');

	}


	public function show($id)
	{
	   $n = Publication::find($id);
	   if(is_null($n))
	   {
			return back();
	   }
	   return view('/publications/show')->with('n', $n);
	}

    public function edit($id)
	{
	   $n = Publication::find($id);
	   if(is_null($n))
	   {
			return back();
	   }
	   return view('/publications/edit')->with('n', $n);
	}
    public function update(Request $request)
	{
	  
       $validator = Validator::make($request->all(), [
       	    'titulo' => 'required',
            'contenido' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', 'Mal, Es necesario completar la información.');
        }

		try {
			$n = Publication::find($request->input('id'));
			$n->title = $request->input('titulo');
			$n->content = $request->input('contenido');
			$n->user_id = Controller::getLogeado()->id;
			$n->save();

	    } catch (\Exception $e) {
	        return back()->with('error', 'No fue posible actualizar la información');
	    }
		return back()->with('success', 'Bien, Publicación actualizada.');
	}
}

<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Publication;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentEmail;


use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($pbl_id){

        $user = Controller::getLogeado();

        $c = Comment::where('user_id', $user->id)
        ->where('publication_id', $pbl_id)
        ->count();

        if ($c > 0) {
            return back()->with('error', 'Ya existe un comentario relacionado al usuario '. $user->name);
        }

        $p = Publication::find($pbl_id);
        return view('comments/index')->with('publ', $p);
    }

    public function store(Request $request ){

        $validator = Validator::make($request->all(), [
            'contenido' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Mal, Es necesario completar la información');
        }

        $user = Controller::getLogeado();

            try {
                
                $n = new Comment;
                $n->publication_id = $request->input('id');
                $n->content =  $request->input('contenido');
                $n->status = 'APROBADO';
                $n->user_id = $user->id;
                $n->save();

                $p = Publication::find($request->input('id'));
                Mail::to($user->email)->send(new CommentEmail($p->title, $user->name));

            } catch (\Exception $e) {
                return back()->with('error', 'No fue posible ingresar la información');
            }

            return redirect('publications/'.$request->input('id'))->with('success', 'Bien, Comentario guardado.');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\event;
use Auth;
use Illuminate\Http\Request;

class eventController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        //Lister les évenements
        $events= event::orderBy('id','desc')->paginate(3);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Afficher le formulaire de création d'évenement
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Enregistre le formulaire de création

        $this->validate($request, [
            'title' => 'required|min:6',
            'description' => 'required|min:20'
        ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Le titre doit faire au moins 6 caractères',
                'description.required' => 'Contenu requis',
                'description.min' => 'Le contenu doit faire au moins 20 caractères'
            ]);


        $event = new event;
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $event->fill($input)->save();

        return redirect()
            ->route('event.index')
            ->with('success', 'L\'évenement a bien été ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = event::findOrFail($id);

        //Afficher un évenement
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Afficher le formulaire d'édition d'évenement
        $event = event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:6',
            'description' => 'required|min:20'
        ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Le titre doit faire au moins 6 caractères',
                'description.required' => 'Contenu requis',
                'description.min' => 'Le contenu doit faire au moins 20 caractères'
            ]);
        // Enregistre le formulaire d'édition en BDD


        $event = event::findOrFail($id);
        $input = $request->input();
        $event->fill($input)->save();



        return redirect()
            ->route('event.show',$id)
            ->with('success', 'L\'évenement a bien été mis à jour');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    //Supprime l'évenement

        $event = event::findOrFail($id);
        $event->delete();
        return redirect()
            ->route('event.index')
            ->with('success', 'L\'évenement a bien été supprimé');
    }


}






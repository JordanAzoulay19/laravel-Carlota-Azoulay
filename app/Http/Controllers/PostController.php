<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
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


 //Lister les articles
        $posts= Post::orderBy('id','desc')->paginate(3);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Afficher le formulaire de création d'article
        return view('posts.create');
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
                'content' => 'required|min:20'
            ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Le titre doit faire au moins 6 caractères',
                'content.required' => 'Contenu requis',
                'content.min' => 'Le contenu doit faire au moins 20 caractères'
            ]);


            $post = new Post;
            $input = $request->input();
            $input['user_id'] = Auth::user()->id;
            $post->fill($input)->save();

        return redirect()
            ->route('post.index')
            ->with('success', 'L\'article a bien été ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        //Afficher un article
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Afficher le formulaire d'édition d'article
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
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
            'content' => 'required|min:20'
        ],
            [
                'title.required' => 'Titre requis',
                'title.min' => 'Le titre doit faire au moins 6 caractères',
                'content.required' => 'Contenu requis',
                'content.min' => 'Le contenu doit faire au moins 20 caractères'
            ]);
        // Enregistre le formulaire d'édition en BDD


        $post = Post::findOrFail($id);
        $input = $request->input();
        $post->fill($input)->save();



        return redirect()
            ->route('post.show',$id)
            ->with('success', 'L\'article a bien été mis à jour');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    //Supprime l'article

            $post = Post::findOrFail($id);
            $post->delete();
            return redirect()
                ->route('post.index')
                ->with('success', 'L\'article a bien été supprimé');
        }


}






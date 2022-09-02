<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        // On transmet les Post à la vue
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $festivals = Festival::where('is_active', 1)->orderBy('name')->get();
        return view("posts.edit", ['festivals' => $festivals]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            "picture" => 'bail|required|image|max:1024',
            "content" => 'bail|required',
        ]);

        // 2. On upload l'image dans "/storage/app/public/posts"
        //$chemin_image = $request->picture->store("posts");

        $file = $request->file('picture');
        $chemin_image= date('YmdHi').$file->getClientOriginalName();
        $file->move('uploads/posts', $chemin_image);

        // 3. On enregistre les informations du Post
        Post::create([
            "title" => $request->title,
            "picture" => $chemin_image,
            "content" => $request->content,
            "festival_id" => $request->festival_id,
            "user_id" => auth()->user()->id,
        ]);

        // 4. On retourne vers tous les posts : route("posts.index")
        return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $festivals = Festival::where('is_active', 1)->orderBy('name')->get();
        return view("posts.edit", compact("post"), ['festivals' => $festivals]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];

        if ($request->has("picture")) {
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        if ($request->has("picture")) {
            $file = $request->file('picture');
            $chemin_image= date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads/posts', $chemin_image);
        }

        $post->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
            "content" => $request->content,
            "festival_id" => $request->festival_id,
            "user_id" => auth()->user()->id,
        ]);

        $posts = Post::latest()->get();
        return view("posts.index", compact("posts"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->picture);

        // On les informations du $post de la table "posts"
        $post->delete();

        // Redirection route "posts.index"
        return redirect(route('posts.index'));
    }

    public function like(Post $post)
    {
        $user = auth()->user();
        $user->votedPosts()->attach($post->id);
    }
}

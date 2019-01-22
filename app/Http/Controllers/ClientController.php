<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientController extends Model
{
    public function store(Request $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $post->save();
        return response()->json('successfully added');
    }
    public function index()
    {
        return new PostCollection(Post::all());
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }
    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json('successfully updated');
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('successfully deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            //'file' => 'required|mimes:mp4,qt,x-ms-wmv,mpeg,x-msvideo',
        ], [
            'title.required' => 'タイトルを入力してください',
            'title.max' => '５０文字以内で入力して下さい',
            'body.required' => '本文を入力してください',
            'body.max' => '2000文字以内で入力して下さい',
            //'file.required' => 'ファイルが選択されていません',
            //'file.mimes' => '動画ファイルではありません',
        ]);
        if ($request->hasFile('datafile', 'imagefile')) {
            $disk = Storage::disk('s3');
            $faileName = $disk->put('', $request->file('datafile'));

            $image_disk = Storage::disk('s3');
            $imageFail = $image_disk->put('', $request->file('imagefile'));

            $post = new Post();
            $post->path = $disk->url($faileName);
            $post->image = $image_disk->url($imageFail);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
        }

        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}

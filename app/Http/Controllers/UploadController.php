<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*  $this->validate($request, [
             'title' => 'required|max:50',
             'body' => 'required|max:2000',
             'file' => 'required|mimes:mp4,qt,x-ms-wmv,mpeg,x-msvideo',
         ], [
             'title.required' => 'タイトルを入力してください',
             'title.max' => '５０文字以内で入力して下さい',
             'body.required' => '本文を入力してください',
             'body.max' => '2000文字以内で入力して下さい',
             'file.required' => 'ファイルが選択されていません',
             'file.mimes' => '動画ファイルではありません',
         ]); */

        if ($request->hasFile('datafile')) {
            $disk = Storage::disk('s3');
            $faileName = $disk->put('', $request->file('datafile'));
            dump($faileName);
            $post = new Post();
            $post->path = $disk->url($faileName);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
        }

        return ['success' => '登録しました。'];

        /* $params = $request->validate([
            'title' => 'require|max:50',
            'body' => 'required|max:2000',
        ]);

        Post::create($params);

        return redirect()->route('top'); */
    }
}

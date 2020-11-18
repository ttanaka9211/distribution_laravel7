<?php

namespace App\Http\Controllers;

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
        // ファイルの存在チェック
        if ($request->hasFile('datafile')) {
            $disk = Storage::disk('s3');

            // S3にファイルを保存し、保存したファイル名を取得する
            $fileName = $disk->put('', $request->file('datafile'));

            // $fileNameには
            // https://saitobucket3.s3.amazonaws.com/uhgKiZeJXMFhL9Vr7yT7XvlJqonPNx30xbJYoEo0.jpeg
            // のような画像へのフルパスが格納されている
            // このフルパスをDBに格納しておくと、画像を表示させるのは簡単になる
            dd($disk->url($fileName));
        }

        redirect('/');
    }
}

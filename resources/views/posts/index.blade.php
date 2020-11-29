@extends('layouts.posts')

@section('content')
<h1>新着動画</h1>
<div class="container">
    <div class="row">
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                投稿を新規作成する
            </a>
        </div>
    </div>
</div>
<div class="container col-lg-10">
    <div class="card-deck">
        <div class="row flex-row flex-nowrap ">


            @foreach ($posts as $post)
            <div class="col-lg-3 ">
                <div class="row ">
                    <div class="card">
                        <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                            <div class="card-header">
                                {{ $post->title }}
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                        {!! nl2br(e(Str::limit($post->body, 200))) !!}
                    </p>
                                <div class="row">
                                    <div class="col">
                                        <img src="{{$post->image}}" alt="" class="img-thumbnail">
                                    </div>
                                </div>
                                {{-- < class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                                続きを読む--}}

                            </div>
                            <div class="card-footer">
                                <span class="mr-2">
                                    投稿日時 {{ $post->created_at->format('y/m/d H:i') }}
                                </span>

                                @if ($post->comments->count())
                                <span class="badge badge-primary">
                                    コメント {{ $post->comments->count() }}件
                                </span>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
</div>
</div>
@endsection

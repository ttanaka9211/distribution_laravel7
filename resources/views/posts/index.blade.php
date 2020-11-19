@extends('layouts.posts')

@section('content')
<div class="mb-4">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        投稿を新規作成する
    </a>

    <div class="container mt-4">
        <div class="card-columns max-auto">
            @foreach ($posts as $post)
            <div class="card mb-4">
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
                        {{-- <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
                </a> --}}
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
        </div>
        </a>
    </div>
    @endforeach
</div>
</div>
<div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
</div>
</div>
@endsection

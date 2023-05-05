@extends('layouts.frontend')

@section('title', 'Single Show')

@section('css')

    <style>
        .error {
            background: none;
            color: red;
            border: none;
            padding: 0 !important;
            margin-top: 5px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .comment_reply_button {
            background: none;
            border: none;

        }
    </style>

@endsection

@section('content')

    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">News details</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ route('frontend.index') }}" class="text-white">Home</a>
                            </li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">News details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($post)
        <section class="section blog-wrap bg-gray">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="row">

                            {{-- post part start --}}

                            <div class="col-lg-12 mb-5">
                                <div class="single-blog-item">

                                    <img loading="lazy" src="{{ '/storage/backend/posts/' . $post->gallery->image }}"
                                        alt="blog" class="img-fluid rounded" width="800">

                                    <div class="blog-item-content bg-white p-5">
                                        <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                            <span class="text-muted text-capitalize mr-3"><i
                                                    class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span>
                                            <span class="text-muted text-capitalize mr-3"><i
                                                    class="ti-comment mr-2"></i>{{ count($comments) }}
                                                Comments</span>
                                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>
                                                {{ $post->created_at->format('d M') }}</span>
                                        </div>

                                        <h2 class="mt-3 mb-4">{{ $post->title }}</h2>

                                        <p>{{ $post->description }}</p>

                                        <div
                                            class="tag-option mt-2 d-block d-md-flex justify-content-between align-items-center">

                                            <ul class="list-inline">

                                                <li class="mb-2">Tags :</li>

                                                @foreach ($post->tags as $tag)
                                                    <li class="list-inline-item"><a>{{ $tag->name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- post part end --}}


                            {{-- comment section start --}}

                            <div class="col-lg-12 mb-5">

                                @if (Session::has('success'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>HI</strong> {!! session('success') !!}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>HI</strong> {!! session('error') !!}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('post.comment', $post->id) }}">
                                    @csrf
                                    <div class="form-group">

                                        <label for=""><strong>Comment</strong></label>

                                        <textarea name="comment" class="form-control" id="" cols="20" rows="3"></textarea>

                                        @error('comment')
                                            <div class="error">{{ $message }}</div>
                                        @enderror

                                        <button type="submit" class="btn btn-sm btn-info btn-pill mt-4">comment</button>

                                    </div>
                                </form>
                            </div>

                            {{-- comment section end --}}


                            {{-- show comment start --}}

                            @if (count($comments) > 0)
                                <div class="col-lg-12 mb-5">
                                    <div class="comment-area card border-0 p-5">
                                        <h4 class="mb-4">{{ count($comments) }} Comments</h4>
                                        <ul class="comment-tree list-unstyled">

                                            @foreach ($comments as $comment)
                                                <li class="mb-5">
                                                    <div class="comment-area-box">

                                                        <h5 class="mb-1">{{ $comment->user ? $comment->user->name : '' }}
                                                        </h5>

                                                        <span>{{ $comment->user ? $comment->user->email : '' }}</span>

                                                        <div
                                                            class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">

                                                            <span
                                                                class="date-comm">{{ $comment->user ? $comment->created_at->format('d M') : '' }}</span>
                                                        </div>

                                                        <div class="comment-content mt-3">
                                                            <p>{{ $comment ? $comment->comment : '' }}</p>
                                                        </div>

                                                        <div class="ml-5">
                                                            @if ($comment->commentReplies)
                                                                @foreach ($comment->commentReplies as $reply)
                                                                    <form method="POST"
                                                                        action="{{ route('comment.delete', $reply->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div
                                                                            class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                                                            <span>
                                                                                <button class="comment_reply_button"
                                                                                    type="submit">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </form>

                                                                    <div class="comment-content mt-3">
                                                                        <p>{{ $reply->comment }}</p>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>

                                                    {{-- comment reply start --}}

                                                    <a class="show-reply" style="cursor: pointer">Reply</a>

                                                    <form class="comment-box" method="POST"
                                                        action="{{ route('comment.reply', $comment->id) }}">
                                                        @csrf
                                                        <div class="form-group">

                                                            <textarea name="comment" class="form-control" id="" cols="20" rows="3"></textarea>

                                                            <button type="submit"
                                                                class="btn btn-sm btn-info btn-pill mt-4">Reply</button>

                                                        </div>
                                                    </form>

                                                    {{-- comment reply start --}}

                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 mt-3">
                                {{ $comments->links() }}
                            </div>


                        </div>
                    </div>

                    {{-- sidebar section end --}}

                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="sidebar-wrap">

                            <div class="sidebar-widget card border-0 mb-3">
                                {{-- <img loading="lazy" src="{{ '/storage/backend/posts/' . $post->gallery->image }}"
                                    alt="blog-author" class="img-fluid"> --}}
                                <div class="card-body p-4 text-center">
                                    <h5 class="mb-0 mt-4">{{ $post->user->name }}</h5>
                                    <p class="mt-2">Digital Marketer</p>
                                </div>
                            </div>

                            <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                                <h5>Latest Posts</h5>

                                @if (count($latestPosts) > 0)
                                    @foreach ($latestPosts as $latestPost)
                                        <div class="media border-bottom py-3">
                                            <a href="{{ route('frontend.show', $latestPost->id) }}"><img loading="lazy"
                                                    class="mr-4"
                                                    src="{{ '/storage/backend/posts/' . $latestPost->gallery->image }}"
                                                    alt="blog" width="100"></a>
                                            <div class="media-body">
                                                <h6 class="my-2"><a
                                                        href="{{ route('frontend.show', $latestPost->id) }}">{{ Str::limit($latestPost->title, 15, '...') }}</a>
                                                </h6>
                                                <span
                                                    class="text-sm text-muted">{{ $latestPost->created_at->format('d M y') }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                            <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                                <h5 class="mb-4">Tags</h5>

                                @if (count($tags) > 0)
                                    @foreach ($tags as $tag)
                                        <a href="{{ route('post.tag', $tag->id) }}">{{ $tag->name }}</a>
                                    @endforeach
                                @endif

                            </div>

                        </div>
                    </div>

                    {{-- sidebar section end --}}

                </div>
            </div>
        </section>
    @else
        <h3 class="text-center text-danger">CANT FIND. TRY AGAIN!</h3>
    @endif

@endsection

@section('js')
    <script>
        $('.comment-box').hide();

        $(document).ready(function() {

            $('.show-reply').click(function() {

                $(this).siblings('.comment-box').toggle('swing');

            });

        });
    </script>
@endsection

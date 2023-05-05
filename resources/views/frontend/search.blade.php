@extends('layouts.frontend')

@section('title', 'Blog Page')

@section('content')
    <!-- Banner Start -->
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ route('frontend.index') }}" class="text-white">Home</a>
                            </li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Our blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <section class="section blog-wrap bg-gray">
        <div class="container">

            @if (count($posts) > 0)
                {{-- posts start --}}

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <div class="blog-item">
                                <img loading="lazy" src="{{ 'storage/backend/posts/' . $post->gallery->image }}"
                                    alt="blog" class="img-fluid rounded">

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                        <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                                class="ti-pencil-alt mr-2"></i>{{ Str::limit($post->category->name, 10, '...') }}</span>
                                        <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                                class="ti-comment mr-2"></i></span>
                                        <span class="text-black text-capitalize d-inline-block mr-3"><i
                                                class="ti-time mr-1"></i>
                                            {{ $post->created_at->format('d/m/Y') }}</span>
                                    </div>

                                    <h3 class="mt-3 mb-3"><a
                                            href="{{ route('frontend.show', $post->id) }}">{{ Str::limit($post->title, 25, '...' . 'read More') }}</a>
                                    </h3>
                                    <p class="mb-4">{{ Str::limit($post->description, 90, '...' . 'read More') }}</p>

                                    <a href="{{ route('frontend.show', $post->id) }}"
                                        class="btn btn-small btn-main btn-round-full">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- posts end --}}

                {{-- pagination start --}}

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-6 text-center">
                        {{ $posts->links() }}
                    </div>
                </div>

                {{-- pagination end --}}
            @else
                <h3 class="text-center text-danger">NO POSTS</h3>
            @endif

        </div>
    </section>
@endsection

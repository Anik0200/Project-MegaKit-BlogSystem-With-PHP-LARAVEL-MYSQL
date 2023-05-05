@extends('layouts.frontend')

@section('title', 'Tags Post')

@section('content')

    <section class="section blog-wrap bg-gray">
        <div class="container">

            {{-- posts start --}}

            @if (count($allPosts) > 0)
                <div class="row">

                    @foreach ($allPosts as $allPost)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <div class="blog-item">

                                <img loading="lazy" src="{{ '/storage/backend/posts/' . $allPost->gallery->image }}"
                                    alt="blog" class="img-fluid rounded">

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                        <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                                class="ti-pencil-alt mr-2">
                                                {{ Str::limit($allPost->category->name, 10, '...') }}</i></span>
                                        <span class="text-muted text-capitalize d-inline-block mr-3"><i
                                                class="ti-comment mr-2"></i></span>
                                        <span class="text-black text-capitalize d-inline-block mr-3"><i
                                                class="ti-time mr-1">
                                                {{ $allPost->created_at->format('d/m/Y') }}</i>
                                        </span>
                                    </div>

                                    <h3 class="mt-3 mb-3"><a
                                            href="{{ route('frontend.show', $allPost->id) }}">{{ Str::limit($allPost->title, 25, '...' . 'read More') }}</a>
                                    </h3>

                                    <p class="mb-4">{{ Str::limit($allPost->description, 90, '...' . 'read More') }}</p>

                                    <a href="{{ route('frontend.show', $allPost->id) }}"
                                        class="btn btn-small btn-main btn-round-full">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

            {{-- posts end --}}

        </div>
    </section>

@endsection

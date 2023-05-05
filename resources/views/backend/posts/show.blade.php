@extends('layouts.master')

@section('title', 'See Post | Admin')

@section('css')
    <style>
        .inner {
            display: inline-block;
        }

        .td {
            text-align: center;
        }

        .image {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection

@section('main')

    <div class="card card-default">

        <div class="card-header">
            <h2>{{ $post->title }}</h2>
        </div>

        <div class="card-body table-responsive">

            <table class="table">

                <tr>
                    <td>CREATOR : {{ $post->user->name }}</td>
                </tr>

                <tr>
                    <td>DESCRIPTION : {{ $post->description }}</td>
                </tr>

                <tr>
                    <td>CATEGORY :
                        <span class="badge badge-pill badge-primary">{{ $post->category->name }}</span>
                    </td>
                </tr>

                <tr>

                    <td>TAGS :
                        @foreach ($post->tags as $tag)
                            <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                        @endforeach
                    </td>

                </tr>

                <div>
                    <tr class="image">
                        <td>
                            <img src="{{ asset('/storage/backend/posts/') . '/' . $post->gallery->image }}" alt="..."
                                class="img-thumbnail" width="400">
                        </td>
                    </tr>
                </div>

            </table>

        </div>

    </div>

@endsection

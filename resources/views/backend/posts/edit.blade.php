@extends('layouts.master')

@section('title', 'Create Posts | Admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    </style>
@endsection


@section('main')

    <div class="card card-default">
        <div class="px-6 py-4">
            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>CREATE POSTS</h2>
                    <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-input-musk" role="button"
                        aria-expanded="false" aria-controls="collapse-input-musk"></a>
                </div>

                <div class="card-body">
                    <div id="collapse-input-musk">

                        <form method="POST" enctype="multipart/form-data" action="{{ route('post.update', $post->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">TITLE</label>
                                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                    class="form-control">

                                @error('title')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">DESCRIPTION</label>
                                <textarea name="description" class="form-control" rows="2">{{ old('description', $post->description) }}</textarea>

                                @error('description')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">STATUS</label>

                                <select class="form-control" name="status">

                                    <option disabled selected>CHOSE</option>
                                    <option @selected(old('status', $post->status) == 1) value="1">Active</option>
                                    <option @selected(old('status', $post->status) == 0) value="0">Deactive</option>

                                </select>

                                @error('status')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">CATEGORY</label>

                                <select class="form-control" id="e1" name="category">

                                    <option disabled selected>CHOSE</option>

                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option @selected(old('category', $post->category->id) == $category->id) value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    @endif

                                </select>

                                @error('category')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>TAGS</label>

                                <select class="form-control" id="e2" multiple name="tags[]">

                                    <option disabled selected>CHOSE</option>

                                    @if (count($tags) > 0)
                                        @foreach ($tags as $tag)
                                            {{-- @if (count($post->tags) > 0)
                                                @foreach ($post->tags as $postTag)
                                                    <option @selected(old('tag', $postTag->id) == $tag->id) value="{{ $tag->id }}">
                                                        {{ $tag->name }}</option>
                                                @endforeach
                                            @endif

                                            @php
                                                continue;
                                            @endphp --}}
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    @endif

                                </select>

                                @error('tags')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">TITLE</label>
                                <input type="file" name="file" value="" class="form-control">

                                @error('file')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>


                            <button type="submit" class="btn btn-primary btn-pill">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#e1").select2();
                $("#e2").select2();
            });
        </script>
    @endsection

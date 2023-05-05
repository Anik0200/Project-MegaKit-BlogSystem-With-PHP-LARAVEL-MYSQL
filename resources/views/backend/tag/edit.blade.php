@extends('layouts.master')

@section('title', 'Edit Tags | Admin')

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
    </style>
@endsection

@section('main')

    <div class="card card-default">
        <div class="px-6 py-4">
            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>EDIT TAGS</h2>
                    <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-input-musk" role="button"
                        aria-expanded="false" aria-controls="collapse-input-musk"></a>
                </div>

                <div class="card-body">
                    <div id="collapse-input-musk">

                        <form method="POST" action="{{ route('tag.update', $tag->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">NAME</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('title', $tag->name) }}">

                                @error('name')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-pill">SUBMIT</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
    @endsection

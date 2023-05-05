@extends('layouts.master')

@section('title', 'Create Category | Admin')

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
                    <h2>CREATE CATEGORY</h2>
                    <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-input-musk" role="button"
                        aria-expanded="false" aria-controls="collapse-input-musk"></a>
                </div>

                <div class="card-body">
                    <div id="collapse-input-musk">

                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf
                            <div class="form-group">

                                <label for="exampleFormControlPasswor3">NAME</label>
                                <input type="text" value="{{ old('name') }}" class="form-control rounded-5"
                                    name="name">

                                @error('name')
                                    <div class="alert alert-danger error">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-footer">

                                <button type="submit" class="btn btn-primary btn-pill">Submit</button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
    @endsection

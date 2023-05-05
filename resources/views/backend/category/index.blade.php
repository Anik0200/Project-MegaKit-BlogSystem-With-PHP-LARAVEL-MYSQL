@extends('layouts.master')

@section('title', 'All Category | Admin')

@section('css')
    <style>
        .inner {
            display: inline-block;
        }
    </style>
@endsection

@section('main')

    <div class="card card-default">

        <div class="card-header">
            <h2>ALL CATEGORY</h2>
        </div>

        <div class="card-body table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)
                        <tr>

                            <td>{{ $category->id }}</td>

                            <td>{{ $category->name }}</td>

                            <td id="outer">

                                @if (!$category->trashed())
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-outline-info btn-sm inner"><i class="fa fa-edit"
                                            aria-hidden="true"></i></a>

                                    <form method="POST" class="inner"
                                        action="{{ route('category.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                @endif

                                @if ($category->trashed())
                                    <a href="{{ route('category.retrive', $category->id) }}"
                                        class="btn btn-outline-dark btn-sm inner"><i class="fa fa-undo"
                                            aria-hidden="true"></i></a>

                                    <a href="{{ route('category.permaDel', $category->id) }}"
                                        class="btn btn-outline-danger btn-sm inner"><i class="fa fa-close"></i></a>
                                @endif

                            </td>

                        </tr>
                    @endforeach

            </table>

            {{ $categories->links() }}

        </div>

    </div>

@endsection


@section('js')
    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '<p class="fs-5">{{ Session::get('success') }}</p>',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
@endsection

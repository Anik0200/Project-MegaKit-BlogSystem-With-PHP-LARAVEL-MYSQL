@extends('layouts.master')

@section('title', 'All Tags | Admin')

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
            <h2>ALL TAGS</h2>
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

                    @foreach ($tags as $tag)
                        <tr>

                            <td>{{ $tag->id }}</td>

                            <td>{{ $tag->name }}</td>

                            <td id="outer">

                                @if (!$tag->trashed())
                                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-outline-info btn-sm inner"><i
                                            class="fa fa-edit" aria-hidden="true"></i></a>

                                    <form method="POST" class="inner" action="{{ route('tag.destroy', $tag->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                @endif

                                @if ($tag->trashed())
                                    <a href="{{ route('tag.retrive', $tag->id) }}"
                                        class="btn btn-outline-dark btn-sm inner"><i class="fa fa-undo"
                                            aria-hidden="true"></i></a>

                                    <a href="{{ route('tag.permaDel', $tag->id) }}"
                                        class="btn btn-outline-danger btn-sm inner"><i class="fa fa-close"></i></a>
                                @endif

                            </td>

                        </tr>
                    @endforeach

            </table>

            {{ $tags->links() }}

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

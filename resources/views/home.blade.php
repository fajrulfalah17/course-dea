@extends('layouts.isGuest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="m-3">{{ $title }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row m-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Deskripsi</th>
                        <th>Tag</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $no }}</td>
                            <td><a href="/article/{{ $article->id }}" style="color: black"
                                    class="text-decoration-none">{{ $article->title }}</a></td>
                            <td>{{ $article->description }}</td>
                            <td><button class="btn btn-primary btn-sm m-1">{{ $article->tag }}</button></td>
                        </tr>
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $articles->links() !!}
            </div>
        </div>
    </div>
@endsection

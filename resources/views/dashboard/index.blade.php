@extends('layouts.isUser')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-2">
                <h1>{{ $title }}</h1>
            </div>
        </div>
        <div class="row w-100">
            <form method="POST" action={{ route('article_add_action') }}>
                @csrf
                <div class="form-row">
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="Judul" name="title" />
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="deskripsi" name="description" />
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="Tag" name="tag" />
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Buat Artikel</button>
                </div>
            </form>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->tag }}</td>
                            <td>
                                <div>
                                    <a href="/article/{{ $article->id }}/edit" class="btn btn-warning btn-sm m-1">Edit</a>
                                    <form method="POST" action={{ route('article_delete_action') }}>
                                        @csrf
                                        <input type="hidden" name="id" value={{ $article->id }} />
                                        <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                                    </form>
                                </div>
                            </td>
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
    {{ session()->get('message') }}
    <div class="container">
        <div class="row">
            <form method="POST" action={{ route('dashboard_logout') }}>
                @csrf
                <input name="token" type="hidden" value={{ $users->token }} />
                <button class="btn btn-danger m-4 align-items-end">Logout</button>
            </form>
        </div>
    </div>
@endsection

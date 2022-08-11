@extends('layouts.isUser')

@section('content')
    <div class="container">
        <div class="row w-100">
            <form method="POST" action={{ route('article_update_action', $article->id) }}>
                @csrf
                {{ method_field('PUT') }}
                <div class="form-row">
                    <div class="form-group col-md-3 m-2">
                        <input type="text" class="form-control" value="{{ $article->title }}" placeholder="Judul" name="title" />
                    </div>
                    <div class="form-group col-md-3 m-2">
                        <input type="text" class="form-control" value="{{ $article->description }}" placeholder="deskripsi" name="description" />
                    </div>
                    <div class="form-group col-md-3 m-2">
                        <input type="text" class="form-control" value="{{ $article->tag }}" placeholder="Tag" name="tag" />
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Edit Artikel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
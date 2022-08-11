@extends('layouts.isUser')

@section('content')
    <div class="container">
        <div class="row w-100">
            <form method="POST" action={{ route('article_add_action') }}>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3 m-2">
                        <input type="text" class="form-control" placeholder="Judul" name="title" />
                    </div>
                    <div class="form-group col-md-3 m-2">
                        <input type="text" class="form-control" placeholder="deskripsi" name="description" />
                    </div>
                    <div class="form-group col-md-3 m-2">
                        <input type="text" class="form-control" placeholder="Tag" name="tag" />
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Buat Artikel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
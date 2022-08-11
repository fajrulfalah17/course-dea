@extends('layouts.isGuest')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $title }}</h1>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <td>{{ $article->title }}</td>
                    </div>
                    <div class="card-body">
                        <td>{{ $article->description }}</td>
                    </div>
                    <div class="card-footer">
                        <td>{{ $article->tag }}</td>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="/" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

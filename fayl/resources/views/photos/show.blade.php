@extends('layouts.app')

@section('title', $photo->title)

@section('content')
<div class="container" >
    <h2 class="mb-4">{{ $photo->title }}</h2>

    <div class="card" >
        <img src="{{ asset('storage/' . $photo->file_path) }}"  alt="rasm" class="img-thumbnail mb-2" width="500">
        <div class="card-body">
            <h5 class="card-title">{{ $photo->title }}</h5>
            <p class="card-text">
                Yuklangan sana: <b>{{ $photo->created_at->format('d-m-Y ') }}</b>
            </p>
            <a href="{{ route('photos.edit', $photo) }}" class="btn btn-warning">Tahrirlash</a>
            <a href="{{ route('photos.index') }}" class="btn btn-secondary">Ortga</a>
        </div>
    </div>
</div>
@endsection

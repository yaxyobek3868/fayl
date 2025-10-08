@extends('layouts.app')

@section('title','Rasmni tahrirlash')

@section('content')
<div class="container">
    <h2 class="mb-4">Rasmni tahrirlash</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('photos.update', $photo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Sarlavha</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $photo->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hozirgi rasm</label><br>
            <img src="{{ asset('storage/' . $photo->file_path) }}" alt="rasm" class="img-thumbnail mb-2" width="200">
        </div>

        <div class="mb-3">
            <label class="form-label">Yangi rasm (ixtiyoriy)</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button class="btn btn-success">Yangilash</button>
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">Ortga</a>
    </form>
</div>
@endsection

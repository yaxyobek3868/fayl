@extends('layouts.app')

@section('title','Yangi rasm yuklash')

@section('content')
<div class="container">
    <h2 class="mb-4">Yangi rasm yuklash</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Sarlavha</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rasm</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <button class="btn btn-primary">Saqlash</button>
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">Ortga</a>
    </form>
</div>
@endsection

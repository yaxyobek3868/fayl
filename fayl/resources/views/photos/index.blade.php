@extends('layouts.app')

@section('content')
<a href="{{ route('photos.create') }}" class="btn btn-primary mb-3">+ Yangi Rasm Yuklash</a>

<div class="row">
    @forelse($photos as $photo)
        <div class="col-md-3">
            <div class="card mb-3 shadow-sm">
                <img src="{{ asset('storage/' . $photo->file_path) }}"
                     class="card-img-top"
                     alt="{{ $photo->title }}"
                     style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $photo->title }}</h5>

                    <a href="{{ route('photos.show', $photo->id) }}" class="btn btn-info btn-sm">Korish</a>
                    <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>

                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Ochirish</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">📭 Hali rasm yuklanmagan</p>
    @endforelse
</div>
@endsection

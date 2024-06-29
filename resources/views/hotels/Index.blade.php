@extends('layouts.hotelier')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">List of Hotels</h1>
        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow rounded h-100">
                        <img src="{{ $hotel->image_url }}" class="card-img-top" alt="{{ $hotel->name }}"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <p class="card-text">{{ $hotel->description }}</p>
                            <p class="card-text"><strong>Address:</strong> {{ $hotel->address }}</p>
                            <p class="card-text"><strong>Rating:</strong> {{ $hotel->rating }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-primary w-100 mb-2">View
                                    Details</a>
                                @canany(['owner-only', 'staff-only'])
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST"
                                            class="d-inline-block ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this hotel?');">Delete</button>
                                        </form>
                                    </div>
                                @endcanany
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

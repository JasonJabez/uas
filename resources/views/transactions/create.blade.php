@extends('layouts.hotelier')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Create Transaction</h1>
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">User</label>
                                <select name="user_id" class="form-control" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h3>Select Product</h3>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10003464-49d01a697ba2d4b93bb3be559628b775.jpeg?_src=imagekit&tr=dpr-2,f-jpg,h-150,pr-true,q-100,w-375" class="img-fluid rounded" alt="Hotel Image">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5 class="card-title">Hotel Name</h5>
                                                    <p class="card-text"><strong>Facility:</strong> Facility details here</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6><strong>Total Rooms</strong></h6>
                                                    <p class="card-text">1 Room(s)</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6><strong>Total Price</strong></h6>
                                                    <p class="card-text">Rp. {{ number_format(1000000, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

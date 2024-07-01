@extends('layouts.hotelier')

@section('content')
    <div class="container py-5">
        <h1>Create Transaction</h1>
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
            
                    <div class="col-md-6 mb-4">
                        <div class="card shadow">
                            <h5 class="card-title">Hotel </h5>
                            <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/10003464-49d01a697ba2d4b93bb3be559628b775.jpeg?_src=imagekit&tr=dpr-2,f-jpg,h-150,pr-true,q-100,w-375" class="card-img-top"  style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">(1x) Room</h5>
                                <p class="card-text"><strong>Facility:</strong> suka</p>
                            </div>
                            <hr class="m-0">
                            <h6><strong>Total Rooms Price</strong></h6>
                            <div class="card-body d-flex justify-content-between" >
                                <p class="card-text"> 1 Room(s)</p>
                                <p class="card-text"> Rp. {{ number_format(1000000, 0, ',', '.') }}</p>                               
                            </div>
                            
                        </div>
                    </div>
               
            </div>

            <button type="submit" class="btn btn-primary">Continous Pay,ent</button>
        </form>
    </div>
@endsection

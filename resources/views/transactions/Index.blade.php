 @extends('layouts.hotelier')

 @section('content')
<!-- Booking Start -->
<div class="container">
  <br>
    <div class="bg-white shadow" style="padding-top: 20px; padding-bottom: 20px;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><h5>Hotel Name</h5></th>
                    <th scope="col"><h5>Hotel Picture</h5></th>
                    <th scope="col"><h5>Hotel Room Type</h5></th>
                    <th scope="col"><h5>Price</h5></th>
                    <th scope="col"><h5>Quantity</h5></th>
                    <th scope="col"><h5>Total Price + Tax</h5></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <h6> Example Hotel </h6> </td>
                    <td> <img src="hotel.jpg"> </td>
                    <td> <h6> Emperor </h6> </td>
                    <td> <h6> Rp. 200.000 </h6> </td>
                    <td style="display:none;" id="price"> 200000 </td>
                    <td> 
                        <input type="number" id="quantity" class="form-control" value="1" min="1" oninput="updateTotalPrice()"> 
                    </td>
                    <td> <h6 id="totalPrice"> Rp. 220.000 </h6> </td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-2 d-flex justify-content-end">
            <button class="btn btn-primary w-100">Confirm and Checkout</button>
        </div>
    </div>
</div>
 <!-- Booking End -->
@endsection

<script>
    function updateTotalPrice() {
      const price = Number(document.getElementById('price').innerHTML);
      const taxRate = 0.1;
      const quantity = document.getElementById('quantity').value;
      const totalPrice = price * quantity;
      const totalPriceWithTax = totalPrice + (totalPrice * taxRate);
      console.log(totalPriceWithTax);
      document.getElementById('totalPrice').innerText = `Rp. ${totalPriceWithTax.toLocaleString("id-ID")}`;
    }
</script>
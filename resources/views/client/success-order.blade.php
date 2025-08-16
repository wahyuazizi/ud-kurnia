<x-template.layout title="{{ $title }}" >
  <x-organisms.navbar :path="$shop->path"/>
    <div class="container py-y d-flex flex-column align-items-center gap-3">
      <img src="{{ asset('client/img/success-order.png') }}" class="border rounded rounded-3" style="width:40%;height:auto;">
      <div class="text-center">
        <h4>Thank you so much for your order</h4>
        <p>Order Code : <u><b class="text-danger">{{ $order_code }}</b></u></p>
        <p>You can always track your orders in the <a href="{{ route('clientCheckOrder') }}"><u>Check Order</u></a>, please keep and don't forget this code for check status order.</p>
      </div>
      <div class="d-flex gap-2">
        <a href="{{ route('clientCheckOrder') }}" class="btn btn-primary">Check Order Now</a>
        <button type="button" id="pay-button" class="btn btn-success">Confirm Payment</button>
      </div>
    </div>
@push('js')
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        fetch('/payment/pay', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                order_code: "{{ $order_code }}"
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        alert("payment success!"); console.log(result);
                        window.location.href = "{{ route('clientCheckOrder') }}"; // Redirect to check order page
                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        alert("waiting for your payment!"); console.log(result);
                    },
                    onError: function(result){
                        /* You may add your own implementation here */
                        alert("payment failed!"); console.log(result);
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                });
            } else if (data.error) {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });
    };
</script>
@endpush
  <x-organisms.footer :shop="$shop"/>
</x-template.layout>
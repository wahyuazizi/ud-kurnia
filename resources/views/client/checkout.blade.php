<x-template.layout title="{{ $title }}" >
  <x-organisms.navbar :path="$shop->path"/>
  <div class="container mt-3">
    <h2>Checkout</h2>
    <hr/>
  </div>
  <x-organisms.carts />
  <x-organisms.checkout-form />
  <x-organisms.footer :shop="$shop"/>
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
                // You can send order details here if needed
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        alert("payment success!"); console.log(result);
                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        alert("wating your payment!"); console.log(result);
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
</x-template.layout>
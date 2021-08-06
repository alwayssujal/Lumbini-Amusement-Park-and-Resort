@extends('user.userlayout')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Khalti Payment Confirmation</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <table>
                <tr>
                    <td>Ticket Price</td>
                    <td>{{ $amount }}</td>
                </tr>
                <tr>
                    <td>Discount (Online)</td>
                    <td>{{ $discount }} %</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>{{ $sellprice }}</td>
                </tr>
            </table>
        </div>
    </div>
    <button id="payment-button" class="btn btn-success">Pay with Khalti</button>
    </div>


<script>
    var config = {
        // replace the publicKey with yours
        "publicKey": "{{ config('global.KHALTI_PUBLIC_KEY') }}",
        "productIdentity": "{{ $khaltiPayment->productIdentity }}",
        "productName": "{{ $khaltiPayment->productName }}",
        "productUrl": "{{ config('global.PRODUCT_URL') }}",
        "paymentPreference": [
            "KHALTI"
            ],
        "eventHandler": {
            onSuccess (payload) {
                // hit merchant api for initiating verfication
                if(payload.idx){
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':'{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        method: 'post',
                        url: "{{ route('khalti.payment_verify') }}",
                        data:payload,
                        success:function(response){
                            console.log(response);
                            if(response.success == 1){
                                window.location.href = "{{ route('khaltisuccess')}}";
                            }
                            else{
                                console.log("Error verify");
                                window.location.href = "{{ route('khaltierror')}}";
                            }
                        },
                        error: function(data){
                            console.log(data);
                            window.location.href = "{{ route('khaltierror')}}";
                        }
                    });
                }
                console.log(payload);
            },
            onError (error) {
                console.log(error);
                window.location.href = "{{ route('khaltierror')}}";
                //window.location.href = "{{ route('buytickets')}}";
            },
            onClose () {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({amount: {{ $khaltiPayment->amount }}});
        //checkout.show({amount: 1000});
    }
</script>

@endsection

@extends('user.userlayout')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Esewa Payment Confirmation</h1>
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
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
            <input value="{{ $eSewaPayment->tAmt }}" name="tAmt" type="hidden">
            <input value="{{ $eSewaPayment->amt }}" name="amt" type="hidden">
            <input value="{{ $eSewaPayment->txAmt }}" name="txAmt" type="hidden">
            <input value="{{ $eSewaPayment->psc }}" name="psc" type="hidden">
            <input value="{{ $eSewaPayment->pdc }}" name="pdc" type="hidden">
            <input value="{{ config('global.ESEWA_MERCHANT_CODE') }}" name="scd" type="hidden">
            <input value="{{ $eSewaPayment->pid }}" name="pid" type="hidden">
            <input value="{{ config('global.DOMAIN') }}/esewa/payment_verify?q=su" type="hidden" name="su">
            <input value="{{ config('global.DOMAIN') }}/esewa/payment_verify?q=fu" type="hidden" name="fu">
            <input value="Proceed to payment" class="btn btn-success" type="submit">
        </form>
    </div>
  </div>
  </div>
@endsection


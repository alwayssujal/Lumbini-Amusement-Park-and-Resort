@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ticketing - Ticket Price</h1>
    </div>
    
  <div class="row">
    @foreach ($tickets as $ticket)
    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-body">
                <form action="{{ url('/admin/updateticket') }}" method="POST">
                  @csrf
                  <input type="hidden" id="{{ $ticket->id }}">

                  <span class="badge  badge-success">
                    {{ $ticket->description }}
                  </span>
                  <br><br>
                  <div class="form-group">
                    <label>{{ $ticket->name }}</label>
                    <input type="number" class="form-control ticket-price"
                      placeholder="Enter ticket price" value="{{ $ticket->price }}">
                  </div>
                  <div class="form-group">
                      <label>Discount</label>
                      <input type="number" class="form-control ticket-discount"
                        placeholder="Enter discount in percent" value="{{ $ticket->discount }}">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlReadonly">Total Price</label>
                      <input class="form-control ticket-total" type="text" placeholder=""
                        id="exampleFormControlReadonly" readonly>
                  </div>
                  <button type="submit" class="btn btn-info">Submit</button>
                </form>
              </div>
            </div>
          </div>
          @endforeach
  </div>
  <!---Container Fluid-->
</div>
<script>
  $('.ticket-price, .ticket-discount').change(function(){
    var total = $(this).parents('form').find('.ticket-total');

    var price = $(this).parents('form').find('.ticket-price').val();
    var discount = $(this).parents('form').find('.ticket-discount').val();

    var intPrice = parseInt(price);
    var intDiscount = parseInt(discount);

    var _totalAmt = price - (intPrice * (intDiscount/100));

    total.val(_totalAmt);
  });
</script>
    
@endsection
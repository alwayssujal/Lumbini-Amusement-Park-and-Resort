@extends('user.userlayout')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Buy tickets</h1>
        </div>

        @if (session('msg'))
          <div class="alert alert-info">
              {{ session('msg') }}
          </div>
      @endif

        @if (session('errormsg'))
          <div class="alert alert-danger">
              {{ session('errormsg') }}
          </div>
      @endif

      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                  @if ($is_booking_close_now)
                      Booking is closed.
                  @else
                  <form action="/bookticket" method="POST">
                    @csrf
                    @foreach ($tickets as $ticket)
                      <div class="form-group">
                      <label for="ticket_{{ $ticket->id }}">{{ $ticket->name }}
                        <span class="badge badge-success" style="font-size: 12px; font-weight: 400;"> Current Price - {{ $ticket->actualprice }} (discount - {{ $ticket->discount }} %) = Total Rs. {{ $ticket->price }})</span></label>
                      <input
                      type="number"
                      class="form-control ticket"
                      name="ticket_{{ $ticket->id }}"
                      value="0"
                      data-price="{{ $ticket->price }}"
                      placeholder="Enter a number"
                      min="0"
                      max="500">
                  </div>
                    @endforeach
                  <div class="form-group" id="simple-date1">
                    <label for="date">Date</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                        </div>
                        <input type="date" class="form-control" value="" name="date" id="date" placeholder="Enter a date">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="total">Total price</label>
                      @if ($discount->discountAmt != "0")
                      <span class="badge badge-success" style="font-size: 12px; font-weight: 400;">{{ $discount->description }}</span>
                      @endif
                      <input type="hidden" value="{{ $discount->discountAmt }}" id="discountAmt" name="discountAmt">
                      <input
                      class="form-control"
                      name="total"
                      type="text"
                      value="0"
                      placeholder=""
                      id="total"
                      readonly>
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-3 pt-0">Pay via</legend>
                      <div class="col-sm-9">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="Khalti">
                          <label class="custom-control-label" for="customRadio1">Khalti</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="Esewa">
                          <label class="custom-control-label" for="customRadio2">Esewa</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio3" name="customRadio" checked class="custom-control-input" value="Cash">
                          <label class="custom-control-label" for="customRadio3">Cash</label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-info">Buy ticket</button>
                </form>
                  @endif
                </div>
              </div>
          </div>
        </div>
      </div>
      <!---Container Fluid-->
      <script>
        $('.ticket').keyup(function(){
          updateTotalPrice();
        });

        $('.ticket').change(function(){
          updateTotalPrice();
        });

        function updateTotalPrice(){
          var _total = 0;
          $('.ticket').each(function(){
            var qty = $(this).val();
            var rate = $(this).attr('data-price');

            var price = parseInt(qty) * parseInt(rate);

            _total = _total + price;
          });
          $('#total').val(_total);
          //console.log(_total);
        }

        // $(document).ready(function () {
        //   $('.select2-single').select2();

        //   // Bootstrap Date Picker
        // //   $('#simple-date1 .input-group.date').datepicker({
        // //     format: 'MM d (D), yyyy',
        // //     todayBtn: 'linked',
        // //     todayHighlight: true,
        // //     autoclose: true,
        // //   });
        // // });
      </script>
@endsection

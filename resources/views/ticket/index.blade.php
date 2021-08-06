@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ticketing - Ticket Price</h1>
    </div>

    <!-- Row -->
      <div class="row">
        @foreach ($tickets as $ticket)
        <div class="col-lg-6">
          <div class="card mb-4">
              <div class="card-body">
                <form action="/ticket/{{ $ticket->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  <span class="badge badge-success">Current Price - {{ $ticket->actualprice }} (discount - {{ $ticket->discount }} %) = Total Rs. {{ $ticket->price }})</span>
                  <br><br>
                  <input type="hidden" value="{{ $ticket->name }}" name="name">
                  <div class="form-group">
                    <label for="price">{{ $ticket->name }}</label>
                    <input
                      type="number"
                      class="form-control _price _changeval"
                      placeholder="Enter ticket price"
                      name="price"
                      min="0"
                      value="{{ $ticket->actualprice }}">
                  </div>
                  <div class="form-group">
                      <label for="discount">Discount</label>
                      <input
                        type="number"
                        class="form-control _discount _changeval"
                        placeholder="Enter discount in percent"
                        name="discount"
                        max="100"
                        min="0"
                        value="{{ $ticket->discount }}">
                  </div>
                  {{-- <div class="form-group">
                    <label for="description">Description</label>
                    <input
                      name="description"
                      class="form-control"
                      type="text"
                      placeholder=""
                      value="{{ $ticket->description }}"> --}}
                  <div class="form-group">
                      <label for="total">Total Price</label>
                      <input
                        class="form-control _total"
                        type="text"
                        value="{{ $ticket->price }}"
                        disabled>
                  </div>
                  <button type="submit" class="btn btn-info">Update</button>
                </form>
              </div>
            </div>
        </div>
        @endforeach
      </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->

  <script>
    $('._changeval').keyup(function(){
      updateValue(this);
    });
    $('._changeval').change(function(){
      updateValue(this);
    });
    function updateValue(obj1){
      var obj = $(obj1).parents("form");
      var _price = obj.find("._price").val();
      var _discount = obj.find("._discount").val();

      var _total =  _price - (_price * (_discount / 100));

      obj.find("._total").val(_total);
    }
  </script>

@endsection

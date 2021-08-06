@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Discount - Online Ticket Discounts</h1>
    </div>
    @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

    <p class="text-gray-700">This is the discount amount if a customer chooses to pay online (Esewa/Khalti).</p>
    <p class="text-gray-700"><i>Set Discount amount to 0 and description to blank for no discounts.</i></p>

    <!-- Row -->
      <div class="row">
        @foreach ($discounts as $discount)
        <div class="col-lg-6">
          <div class="card mb-4">
              <div class="card-body">
                <form action="/ticket_discount/{{ $discount->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  {{-- <span class="badge badge-success">{{ $discount->description }}</span> --}}
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter discount name"
                      name="name"
                      value="{{ $discount->name }}"
                      readonly>
                  </div>
                  <div class="form-group">
                      <label for="discount">Discount</label>
                      <input
                        type="number"
                        class="form-control _discount"
                        placeholder="Enter discount in percent"
                        name="discount"
                        value="{{ $discount->discountAmt }}"
                        min="0"
                        max="100">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input
                      name="description"
                      class="form-control _desc"
                      type="text"
                      placeholder=""
                      readonly
                      value="{{ $discount->description }}">
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
    $('._discount').keyup(function(){
      $('._desc').val("Discount - " + $('._discount').val() + "% (If paid through online)");
    });
    $('._discount').change(function(){
      $('._desc').val("Discount - " + $('._discount').val() + "% (If paid through online)");
    })
  </script>

@endsection

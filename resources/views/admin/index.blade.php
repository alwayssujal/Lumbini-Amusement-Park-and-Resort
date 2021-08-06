@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Ticket Sales Today</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ticket_sales_today->total }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">New User Today</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $new_users_today->total }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Ticket Sales</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_ticket_sales->total }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Customers</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_customers->total }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Invoice Example -->
      <div class="col-xl-12 col-lg-12 mb-12">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Recent Booking</h6>
            <a class="m-0 float-right btn-sm" href="/admin/booking" style="color:#3abaf4 !important;">View More <i
                class="fas fa-chevron-right"></i></a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Order No</th>
                  <th>Customer</th>
                  <th>Ticket Date</th>
                  <th>Purchase Date</th>
                  <th>No. of People</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($recent_bookings as $recent_booking)
                <tr>
                  <td>{{ $recent_booking->orderNo }}</td>
                  <td>{{ $recent_booking->customer_name }}</td>
                  <td>{{ date('F d (D), Y', strtotime($recent_booking->ticketDate)) }}</td>
                  <td>{{ date('F d (D), Y', strtotime($recent_booking->created_at)) }}</td>
                  <td>
                    @foreach ($recent_booking->details as $detail)
                        {{ substr($detail->name,0, strpos($detail->name, " ")).'-'.$detail->quantity }} <br>
                    @endforeach
                </td>
                  <td>
                    @if ( $recent_booking->isCancelled )
                        <span class="badge badge-danger">{{ $recent_booking->isPaid ? "Cancelled but Paid (".('Rs.'.$recent_booking->total.")") : "Cancelled(".('Rs.'.$recent_booking->total.")") }}</span>
                    @else
                        @if ($recent_booking->isPaid)
                            <span class="badge badge-success">Paid ({{'Rs.'.$recent_booking->total  }})</span>
                        @else
                            <span class="badge badge-danger">Pending ({{'Rs.'.$recent_booking->total  }})</span>
                        @endif
                    @endif
                  </td>
                  <td>
                    @if ($recent_booking->isCancelled)
                        @if ($recent_booking->isPaid)
                        <a onclick="return confirm('Are you sure?')" href="/admin/cancel_payment/{{ $recent_booking->id }}" class="btn btn-sm btn-warning">Cancel Payment</a>
                        @else
                            Cancelled
                        @endif
                    @else
                        @if ($recent_booking->isPaid)
                        Paid by {{ $recent_booking->payment_method }}
                        @else
                        <a onclick="return confirm('Are you sure?')" href="/admin/accept_payment/{{ $recent_booking->id }}" class="btn btn-sm btn-success">Accept Payment</a>
                        @endif
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->

@endsection

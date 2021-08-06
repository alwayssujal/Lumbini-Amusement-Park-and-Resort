@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Booking List</h1>
    </div>

    @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

    <!-- Row -->
    <div class="row">
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Ticket Date</th>
                  <th>Purchase date</th>
                  <th>No. of People</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Ticket Date</th>
                  <th>Purchase date</th>
                  <th>No. of People</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                  <td>{{ $ticket->orderNo }}</td>
                  <td>{{ $ticket->customer_name }}</td>
                  <td>{{ date('F d (D), Y', strtotime($ticket->ticketDate)) }}</td>
                  <td>{{ date('F d (D), Y', strtotime($ticket->bookingDate)) }}</td>
                  <td>
                      @foreach ($ticket->details as $detail)
                          {{ substr($detail->name,0, strpos($detail->name, " ")).'-'.$detail->quantity }} <br>
                      @endforeach
                  </td>
                  <td>
                    @if ( $ticket->isCancelled )
                    <span class="badge badge-danger">{{ $ticket->isPaid ? "Cancelled but Paid (".('Rs.'.$ticket->total.")") : "Cancelled (".('Rs.'.$ticket->total.")") }}</span>
                    @else
                        @if ($ticket->isPaid)
                            <span class="badge badge-success">Paid ({{'Rs.'.$ticket->total  }})</span>
                        @else
                            <span class="badge badge-danger">Pending ({{'Rs.'.$ticket->total  }})</span>
                        @endif
                    @endif
                  </td>
                  <td>
                    @if ($ticket->isCancelled)
                        @if ($ticket->isPaid)
                        <a onclick="return confirm('Are you sure?')" href="/admin/cancel_payment/{{ $ticket->id }}" class="btn btn-sm btn-warning">Cancel Payment</a>
                        @else
                            Cancelled
                        @endif
                    @else
                        @if ($ticket->isPaid)
                        Paid by {{ $ticket->payment_method }}
                        @else
                        <a onclick="return confirm('Are you sure?')" href="/admin/accept_payment/{{ $ticket->id }}" class="btn btn-sm btn-success">Accept Payment</a>
                        @endif
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->

  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
        <a href="{{ route('logout') }}" class="btn btn-info" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </div>
    </div>
  </div>
</div>

  <!-- Page level plugins -->
  <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js'); }}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable({
          'ordering': false
      }); // ID From dataTable
      $('#dataTableHover').DataTable({
        'ordering': false
      }); // ID From dataTable with Hover
    });
  </script>
@endsection

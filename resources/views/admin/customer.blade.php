@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Customer List</h1>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>Customer ID</th>
                  <th>Customer</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Total Tickets Purchased</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Customer ID</th>
                  <th>Customer</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Total Tickets Purchased</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td style="text-align: center">{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td  style="text-align: center">{{ $user->total_tickets }}</td>
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
  <!-- Page level plugins -->
  <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js'); }}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endsection
@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 
  <link rel="stylesheet" href="../../plugins/sweetalert2.min.css">
@endsection
@section('content')
@include('layouts.partials.sidebar')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                  </ol>
                </div>
              </div>
            </div>
        </div>
       
        <!--Staff Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Staff</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" >
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Firstname">
                        </div>

                        <div class="form-group">
                          <select class="form-control" name="role_id" id="role_id">
                            <option value="">--Select User Role</option>
                            <option value="2">Staff</option>
                            {{-- <option value="2">Staff</option> --}}
                          </select>
                        </div>

                        <div class="form-group">
                          <input type="email" class="form-control"  name="email" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
                        </div>
                      <button class="btn btn-primary" name="submit" type="submit">save</button>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
            </div>
          </div>

        <div style="margin-left: 20px !important; margin-right: 20px !important;" class="card">
            <div class="card-header">
              <h3 class="card-title">User Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                New User
              </button>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        </tr>
                        <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 @include('layouts.partials.footer')
 
@endsection
@section('script')
   
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script> --}}
{{-- <script src="../../plugins/moment/moment.min.js"></script> --}}
{{-- <script src="../../plugins/daterangepicker/daterangepicker.js"></script> --}}
{{-- <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}
{{-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> --}}
{{-- <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
<script src="../../dist/js/adminlte.js"></script>
<script src="../../dist/js/pages/dashboard.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
  });

$(function () {
  $('#saveStaff').click(function(e) {
    e.preventDefault();
      let formData = [
        // $('#staffPics').val(),
        $('#role_id').val(),
        $('#name').val(),
        $('#email').val(),
        $('#password').val(),
      ];
      
     console.log(formData);
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "POST",
          url: "{{ route('store-staff') }}",
          data: {
              data: formData,
          },
          dataType: "json",
          success:function(response){
            if (response.message) {
              console.log(response);
            }
          },
      });
  });
});
  </script>
@endsection
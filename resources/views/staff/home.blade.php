@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
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
                  <h5 class="modal-title" id="exampleModalLabel">New User  </h5>
                 
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
                            @if (Auth::user()->role_id == 1)
                                <option value="1">Superadmin</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                            @else
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                            @endif
                           
                          </select>
                        </div>

                        <div class="form-group">
                          <input type="email" class="form-control"  name="email" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
                        </div>
                     
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" name="submit" type="submit">save</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
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
              <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                New User
              </button><br><br>
                <table style="color: beige !important" class="table table-bordered ">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Can</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="color: beige !important" id="tblBody">
                        
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
<script src="../../dist/js/adminlte.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>


<script>
  const base_url = {!! json_encode(url('/')) !!}

  function getUsers() {
    $.ajax({
        type: "GET",
        url: "{{ route('staff-home') }}",
        dataType: "json",
        success:function(response){
          tableView(response);
        },
        error:function(error){
          console.log(error);
        }
    });
  }

  function tableView(response) {
    var tableBlade = "";
    var userAction = "";
    var can = "";
    var i = 1;
    if (response.users.length <= 0) {
      tableBlade += `<tr class="removeRow">
                        <td colspan="5">No Available User</td>
                    </tr>`;
    }
    $.each(response.users, function(key, value) {
      var id = value.id;
      var name = value.name;
      var email = value.email;
      var role = value.role_id;
      if (role == 1) {
        userAction = `<button data-role="${role}" data-id="${id}" class="btn btn-info btn-sm superadmin_view">View</button>`;
        can = `<span class="badge badge-primary">Create</span>
              <span class="badge badge-info">View</span>
              <span class="badge badge-warning">Edit</span>
              <span class="badge badge-danger">Delete</span>`;
      }
      if (role == 2){
        userAction = `<button data-role="${role}" data-id="${id}" class="btn btn-info btn-sm superadmin_view ">View</button>
                      <button data-role="${role}" data-id="${id}" class="btn btn-primary btn-sm superadmin_edit">Edit</button>
                      <button data-role="${role}" data-id="${id}" onclick="delete_me(${role}, ${id})" class="btn btn-danger btn-sm superadmin_delete">Delete</button>`;

        can = `<span class="badge badge-info">View</span>
              <span class="badge badge-warning">Edit</span>`;
      }
      if (role == 3) {
        userAction = `<button data-role="${role}" data-id="${id}" class="btn btn-info btn-sm superadmin_view">View</button>
                      <button data-role="${role}" data-id="${id}" class="btn btn-primary btn-sm superadmin_edit">Edit</button>
                      <button data-role="${role}" data-id="${id}" onclick="delete_me(${role}, ${id})" class="btn btn-danger btn-sm superadmin_delete">Delete</button>`;

        can = `<span class="badge badge-info">View</span>`;
      }
      
        tableBlade += `<tr class="removeRow">
                        <td>${i++}</td>
                        <td>${name}</td>
                        <td>${email}</td>
                        <td>${can}</td>
                        <td>${userAction}</td>
                      </tr>`;
    });
    $('.removeRow').remove();
    $('#tblBody').append(tableBlade);
  }

  //delete function
  function delete_me(role, id) {
    console.log(role+" and "+id);
    //check if user is authorized to delete
    if (role != 1 ) {
      Swal.fire("Warning", "Action restricted from you", "warning");
    }
  }


  $(function () {
    getUsers(); //get table view
 
    $('#saveStaff').click(function(e) {
      e.preventDefault();
        let formData = [
          // $('#staffPics').val(),
          $('#role_id').val(),
          $('#name').val(),
          $('#email').val(),
          $('#password').val(),
        ];
        
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "POST",
            url: "{{ route('store') }}",
            data: {
                data: formData,
            },
            dataType: "json",
            success:function(response){
              getUsers();
              if (response.status == 200) {
                Swal.fire("Sucesss", response.message, "success");
              }
            },error:function(error){
              Swal.fire("Error","" , "error");
            },
        });
    });

   
});
  </script>
@endsection
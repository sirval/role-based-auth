<!-- New Staff Modal -->
  <div class="modal fade dark-mode" id="newStaff"  data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="newStaffForm" action="{{ route('store-staff') }}" method="post" enctype="multipart/form-data"
            @csrf
            <div class="row mb-2">
                <div class="col-12">
                    <center>
                        <img src="" alt="" srcset="">
                        <input type="file" class="form-control" id="staffPics">
                    </center>
                </div>
                <br><br><br><br>
                <div class="col-6">
                  <label for="">Firstname</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" required>
                </div>
                <div class="col-6">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" required>
                </div><br><br>
                <div class="col-6">
                  <label for="">DoB</label>
                    <input type="date" class="form-control" name="dob" id="dob" required>
                </div>
                <div class="col-6">
                  <label for="">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Contact Number" required>
                </div>
                <div class="col-6">
                  <label for="">Email </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div><br><br>
                <div class="col-6">
                  <label for="">Role/Position</label>
                    <input type="text" class="form-control" name="role" id="role" placeholder="Role/Position" required>
                </div>
                <div class="col-6">
                  <label for="">Highest Qualification</label>
                    <input type="text" class="form-control" name="qualification" id="qualification" placeholder="Highest Qualification" >
                </div><br><br>
                <div class="col-6">
                  <label for="">School Attended</label>
                    <input type="text" class="form-control" name="school" id="school" placeholder="School Obtained" >
                </div>
                <div class="col-6">
                  <label for="">Date Employed</label>
                  <input type="date" class="form-control" name="dEmployed" id="dEmployed"  >
                </div>
                <div class="col-6">
                  <label for="">Staff Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Staff Password" >
                </div>

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  name="saveStaff" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
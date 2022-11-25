<div>
  <section class="form_one student_wrapper">
    <div class="student_detail_wrapper">
      <div class="form_student_details">
        <div class="main_heading">
          <h2>User Details</h2>
        </div>
        <div class="studentWise_details">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="student_box">
                <label>User Name:</label>
                <div class="student_box_text">
                  <p>{{ $user->full_name??'-' }}</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="student_box">
                <label>Email:</label>
                <div class="student_box_text">

                  <p>{{ $user->email??'-' }}</p>

                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-4">
              <div class="student_box">
                <label>Phone:</label>
                <div class="student_box_text">

                  <p>{{ $user->Pro_Mobile??'-' }}</p>

                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-4">
              <div class="student_box">
                <label>Status:</label>
                <div class="student_box_text">

                  <p>Active</p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div>
    <section class="form_one student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Recommendation Details</h2>
                </div>


                <div class="studentWise_details">
                    <h4 class="sub_heading">Recommendation</h4>
                    <div class="row">


                        <div class="col-lg-6 col-md-6">
                            <div class="student_box">
                                <label>Recommendation Name:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Name']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="student_box">
                                <label>Recommendation Email:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Email']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4">
                            <div class="student_box">
                                <label>Recommendation Student Name:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Student']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4">
                            <div class="student_box">
                                <label>Recommendation Message:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Message']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="student_box">
                                <label>Recommendation Request Send Date:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Request_Send_Date']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="student_box">
                                <label>Recommendation Relationship To Student:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Relationship_to_Student']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="student_box">
                                <label>Recommendation Year Known Student:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Years_Known_Student']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="student_box">
                                <label>Recommendation:</label>
                                <div class="student_box_text">

                                    <p>{{ $recommendation['Rec_Recommendation']??'--' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="student_box">
                                <label>Recommendation Submit Date:</label>
                                <div class="student_box_text">

                                    <p>{{ \Carbon\Carbon::parse($recommendation[' Rec_Send_Date'])->format('d-m-Y') }}</p>

                                </div>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
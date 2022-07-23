@extends('layouts.app')

@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Registration</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStd') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('studentRegistration.update',$studentRegistration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin: 60px" class="row">


{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>Index Number:</strong>--}}
{{--                        <input value="{{ $studentRegistration->indexNum }}" type="text" name="indexNum" class="form-control" placeholder="Index Number">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name with initials:</strong>
                        <input readonly value="{{ $studentRegistration->nameWithInitials }}" required type="text" name="nameWithInitial" class="form-control" placeholder="Name with initials">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Full name in English block letters:</strong>
                        <input readonly value="{{ $studentRegistration->fullNameInEnglishBlock }}" type="text" name="fullNameInEnglishBlock" class="form-control" placeholder="Full name in English block letters">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Full name in Sinhala:</strong>
                        <input readonly value="{{ $studentRegistration->fullNameInSinhala }}" type="text" name="fullNameInSinhala" class="form-control" placeholder="Full name in Sinhala">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        <input readonly value="{{ $studentRegistration->gender }}" type="text" name="gender" class="form-control" placeholder="Gender">

{{--                        <select required name="gender" class="custom-select" id="inputGroupSelect01" >--}}
{{--                            <option selected>{{ $studentRegistration->gender }}</option>--}}
{{--                            <option value="Male">Male</option>--}}
{{--                            <option value="Female">Female</option>--}}
{{--                        </select>--}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIC Number:</strong>
                        <input required value="{{ $studentRegistration->indexNum }}" type="text" name="nic" class="form-control" placeholder="NIC Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Postal Address:</strong>
                        <input required value="{{ $studentRegistration->address }}" type="text" name="address" class="form-control" placeholder="Postal Address">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile Number:</strong>
                        <input required value="{{ $studentRegistration->mobileNumber }}" type="text" name="mobileNumber" class="form-control" placeholder="Mobile Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input readonly value="{{ $studentRegistration->email }}" type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Faculty:</strong>
                        <input readonly value="{{ $studentRegistration->faculty }}" required type="text" name="faculty" class="form-control" placeholder="Faculty">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Department:</strong>
                        <input readonly value="{{ $studentRegistration->department }}" required type="text" name="department" class="form-control" placeholder="Department">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name of the degree to be conferred:</strong>
                        <input readonly value="{{ $studentRegistration->degreeName }}" type="text" name="degreeName" class="form-control" placeholder="Name of the degree to be conferred">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Register Number:</strong>
                        <input readonly value="{{ $studentRegistration->regNum }}" type="text" name="regNum" class="form-control" placeholder="Register Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Index Number:</strong>
                        <input readonly value="{{ $studentRegistration->indexNum }}" type="text" name="indexNum" class="form-control" placeholder="Index Number">
                    </div>
                </div>

                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker2').datepicker({
                            format: "mm/yyyy",
                            viewMode: "months",
                            minViewMode: "months",
                            weekStart: 0,
                            calendarWeeks: true,
                            autoclose: true,
                            todayHighlight: true,
                            orientation: "auto",

                        });
                    });
                </script>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Month and Year of the Degree Examination: </strong>
                        <input readonly value="{{ $studentRegistration->monthAndYearExamination }}" required type="text" name="monthAndYearExamination" class="form-control" placeholder="Month and year of examination">

                        {{--                        <div class='input-group date' id='datetimepicker2'>--}}
{{--                            <input required value="{{ $studentRegistration->monthAndYearExamination }}" placeholder="MM/YYYY" required name="monthAndYearExamination" type='text' class="form-control" />--}}
{{--                            <span class="input-group-addon">--}}
{{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                        </span>--}}
{{--                        </div>--}}
                    </div>
                </div>
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <strong>Month and Year of the Degree Examination:</strong>--}}

{{--                </div>--}}
{{--                <div class="col-xs-6 col-sm-6 col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <input value="{{ $studentRegistration->monthExamination }}" type="text" name="monthExamination" class="form-control" placeholder="MM">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xs-6 col-sm-6 col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <input value="{{ $studentRegistration->yearExamination }}" type="text" name="yearExamination" class="form-control" placeholder="YYYY">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mark the relevant one:</strong>
                        <input readonly value="{{ $studentRegistration->degreeClass }}" required type="text" name="degreeClass" class="form-control" placeholder="Degree Class">

                        {{--                        <div class="row">--}}
{{--                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">--}}
{{--                                <strong style="margin-right:10px">1st Class:</strong>--}}
{{--                                <input {{ ($studentRegistration->degreeClass == "1st Class") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="1st Class" >--}}
{{--                            </div>--}}
{{--                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">--}}
{{--                                <strong style="margin-right:10px">2nd Upper:</strong>--}}
{{--                                <input {{ ($studentRegistration->degreeClass == "2nd Upper") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="2nd Upper" >--}}
{{--                            </div>--}}
{{--                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">--}}
{{--                                <strong style="margin-right:10px">2nd Lower:</strong>--}}
{{--                                <input {{ ($studentRegistration->degreeClass == "2nd Lower") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="2nd Lower" >--}}
{{--                            </div>--}}
{{--                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">--}}
{{--                                <strong style="margin-right:10px">Ordinary Pass:</strong>--}}
{{--                                <input {{ ($studentRegistration->degreeClass == "Ordinary Pass") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="Ordinary Pass" >--}}
{{--                            </div>--}}

{{--                        </div>--}}

                    </div>
                </div>

                {{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>Whether you attend the convocation:</strong>--}}

                {{--                    <select  id="attend" name="attend" class="custom-select" id="inputGroupSelect01" >--}}
                {{--                        <option selected>Choose...</option>--}}
                {{--                        <option value="Yes">Yes</option>--}}
                {{--                        <option value="No">No</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                {{--            </div>--}}



                <script>

                    $(function() {

                        // run on change for the selectbox
                        $( "#frm_duration" ).change(function() {
                            updateDurationDivs();
                        });

                        // handle the updating of the duration divs
                        function updateDurationDivs() {
                            // hide all form-duration-divs
                            $('.form-duration-div').hide();

                            var divKey = $( "#frm_duration option:selected" ).val();
                            $('#divFrm'+divKey).show();
                        }

                        // run at load, for the currently selected div to show up
                        updateDurationDivs();

                    });
                </script>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Whether you attend the convocation:</strong>
                        <div>
                            <select required name="attendance" class="form-control" id="frm_duration">
                                <option selected>{{ $studentRegistration->attendance }}</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="divFrmYes" class="form-group form-duration-div" style="display:none">
                    {{--============--}}
                    <div>
                        If Yes, Please give the Names and the NIC of two visitors you are intending to accompany:
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">

                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <strong>Visitor 1</strong>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <strong>Visitor 2</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input value="{{ $studentRegistration->nameVisitor1 }}" type="text" name="nameVisitor1" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input value="{{ $studentRegistration->nameVisitor2 }}" type="text" name="nameVisitor2" class="form-control" placeholder="Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <strong>NIC Number:</strong>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input value="{{ $studentRegistration->nicVisitor1 }}" type="text" name="nicVisitor1" class="form-control" placeholder="NIC">
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input value="{{ $studentRegistration->nicVisitor2 }}" type="text" name="nicVisitor2" class="form-control" placeholder="NIC">
                            </div>
                        </div>
                    </div>
                    {{--            ==============--}}


                    {{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <strong>Index Number:</strong>--}}
                    {{--                        <input type="text" name="indexNum" class="form-control" placeholder="Index Number">--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                    {{--            ============--}}
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Payment Receipt:</strong>
                        <input required value="{{ $studentRegistration->image }}" type="file" name="image" class="form-control" placeholder="image" id="image">
                    </div>
                </div>

                <div class="row">
                    <div style="display: inline-flex; justify-content: center" class="col-xs-1 col-sm-1 col-md-1">
                        <input style="margin-top: 14px" required type="checkbox" name="vehicle" value="Bike">
                    </div>
                    <div class="col-xs-11 col-sm-11 col-md-11">
                        <div>
                            I do solemnly declare that I shall faithfully observe the statutes, by - laws and regulations and rules of the Sabaragamuwa University of Sri Lanka in so far as they may apply to me and that I shall not make use of the privileges to be presently conferred on me in any manners so as bring the University into disrepute.
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col-xs-1 col-sm-1 col-md-1" style="margin-top: 8px">
                        <strong>Date: </strong>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <input readonly value="{{Carbon\Carbon::now()->toDateString()}}" type="text" name="signedDate" class="form-control" placeholder="Date">

                        {{--                        <div class="form-group">--}}
{{--                            <div class='input-group date' id='datetimepicker1'>--}}
{{--                                <input required value="{{ $studentRegistration->signedDate }}" name="signedDate" type='text' class="form-control" />--}}
{{--                                <span class="input-group-addon">--}}
{{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                        </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>






                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datepicker({
                            format: "mm/dd/yy",
                            weekStart: 0,
                            calendarWeeks: true,
                            autoclose: true,
                            todayHighlight: true,
                            orientation: "auto"
                        });
                    });
                </script>

                <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>








                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>

@endsection

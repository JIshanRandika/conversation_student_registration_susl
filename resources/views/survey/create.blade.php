@extends('layouts.app')

@section('content')


    <div style="margin-left: 10%;margin-right: 10%">
    <div class="">

<!--        -->
        <?php
        session_start();
//
        $_SESSION["user_reg"]=strtoupper(trim(Auth::user()->regNum));
        $_SESSION["stdName"]=strtoupper(trim(Auth::user()->name));
//
//
        ?>
{{--            <p>{{ $_SESSION["stdName"] }}</p>--}}
{{--            @foreach (($eligibleStudents) as $eligibleStudent)--}}

{{--                --}}{{--                    @if (strtoupper(trim($eligibleStudent->regNum)) === strtoupper(trim(Auth::user()->regNum)))--}}
{{--                @if (strtoupper(trim(str_replace(' ', '', str_replace('/', '', $eligibleStudent->regNum)))) === strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))--}}
{{--                    @php--}}
{{--                        $_SESSION["convocationName"]=$eligibleStudent->convocationName;--}}
{{--                    @endphp--}}

{{--                @endif--}}
{{--            @endforeach--}}


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div style="margin: 20px" class="row">
            <div class="col-lg-12 margin-tb">
                <div style="text-align: center;margin-bottom: 40px;margin-top: 20px">
                    <h2 style="font-weight: bold">Employability Study of All Graduands</h2>
                </div>
                <div class="pull-left">
                    <h5 style="font-weight: bold">This is the official census form for all graduands</h5>
                </div>
                <div class="pull-left">
                    <h6>Please complete the survey and help improve and reform the quality of higher education in Sri Lanka. The estimated time to complete this survey is less than 5 minutes. Note that your answers are anonymous and that they will be protected by law.</h6>
                </div>

                <hr/>

                <div class="pull-right">
{{--                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>--}}
                </div>
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




    <form action="{{ route('survey.store') }}" id="selectSurveyForm" method="POST">
{{--    <form  id="selectform" method="POST">--}}
        @csrf
        @foreach ($eligibleStudents as $eligibleStudent)
            @if (strtoupper(trim(str_replace(' ', '', str_replace('/', '', $eligibleStudent->regNum)))) === strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))
        <div style="margin: 20px" class="row">
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Student Name</strong>--}}
{{--                    <input  required type="text" name="stdName" class="form-control" placeholder="Name">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Registration Number</strong>--}}
{{--                    <input  required type="text" name="regNum" class="form-control" placeholder="Reg. Num">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Convocation Name</strong>--}}
{{--                    <input  required type="text" name="convoName" class="form-control" placeholder="Convocation Name">--}}
{{--                </div>--}}
{{--            </div>--}}

            <strong>01. Contact Details:</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Email:</strong>
                    <input  required type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Contact Number:</strong>
                    <input required type="text" name="contactNumber" class="form-control" placeholder="Contact Number">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
{{--                <div class="form-group">--}}
{{--                    {{Form::label('property', 'Please Select a Property ') }}--}}
{{--                    {{Form::select('property', ['Holiday Resort' => 'Holiday Resort', 'NEST' => 'NEST','Agri Farm Kabana' => 'Agri Farm Kabana', 'Agri Farm Dining Room' => 'Agri Farm Dining Room', 'Audio Visual Unit' => 'Audio Visual Unit'], null, ['class'=>'form-control','v-model' => 'property_type'])}}--}}

{{--                </div>--}}

                <div class="form-group">

                    <strong>02. Gender:</strong>
                    <select required name="gender" class="custom-select" id="inputGroupSelect01"  >
                        <option></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>03. GCE (A/L) Examination, District:</strong>
                    <select required name="district" class="custom-select" id="inputGroupSelect02" >
                        <option></option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>04. GCE (A/L) Examination, Z-Score or Aggregate Marks:</strong>
                    <input required type="text" name="zScore" class="form-control" placeholder="Z-Score or Aggregate Marks">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>05. Ethnicity:</strong>
                    <select required name="ethnicity" class="custom-select" id="inputGroupSelect03" >
                        <option></option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Burgher">Burgher</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>05. Faculty/Institution:</strong>
                    <input readonly value="{{ $eligibleStudent->faculty }}" required type="text" name="faculty" class="form-control" placeholder="Faculty/Institution">
                </div>
            </div>
            
            


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>05. Under which of the following does your degree fall?</strong>
                    <select required name="degreeFall" class="custom-select" id="inputGroupSelect05" >
                        <option></option>
                        <option value="External">External</option>
                        <option value="Internal">Internal</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>7.1. Name of the Degree Programme: EX: BSC Business Administration(Business Economics)(Honours):</strong>
                    <input required type="text" name="degreeProgram" class="form-control" placeholder="Name of the Degree Programme">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>08. Degree type:</strong>
                    <select required name="degreeType" class="custom-select" id="inputGroupSelect06" >
                        <option></option>
                        <option value="General (3 years)">General (3 years)</option>
                        <option value="General (4 years)">General (4 years)</option>
                        <option value="Special">Special</option>
                        <option value="Honours">Honours</option>
                        <option value="Medical (5 years)">Medical (5 years)</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>8.1. If Special/Honours, please specify area of specialization: (EX: Economics):</strong>
                    <input required type="text" name="specialization" class="form-control" placeholder="Area of specialization">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>09. Medium of Instruction:</strong>
                    <select required name="medium" class="custom-select" id="inputGroupSelect07" >
                        <option></option>
                        <option value="English">English</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>10. Class received:</strong>
                    <select required name="classReceived" class="custom-select" id="inputGroupSelect08" >
                        <option></option>
                        <option value="First Class">First Class</option>
                        <option value="Second Upper">Second Upper</option>
                        <option value="Second Lower">Second Lower</option>
                        <option value="General Pass">General Pass</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>11. English Language Proficiency</strong>
                <div class="form-group">
                    <strong>11.1 The Grade you received for GCE(O/L) English Language:</strong>
                    <select required name="olEnglish" class="custom-select" id="inputGroupSelect09" >
                        <option></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="F">F</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>11.2 The Grade you received for GCE(A/L) General English:</strong>
                    <select required name="alEnglish" class="custom-select" id="inputGroupSelect10" >
                        <option></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="F">F</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <strong>11.3 English language proficiency at the University Level(as per your own understanding):</strong>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Speaking Skills:</strong>
                    <select required name="engSpeakSkill" class="custom-select" id="inputGroupSelect11" >
                        <option></option>
                        <option value="Poor">Poor</option>
                        <option value="Average">Average</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Listening Skills:</strong>
                    <select required name="engListeningSkill" class="custom-select" id="inputGroupSelect12" >
                        <option></option>
                        <option value="Poor">Poor</option>
                        <option value="Average">Average</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>c. Writing Skills:</strong>
                    <select required name="engWritingSkill" class="custom-select" id="inputGroupSelect13" >
                        <option></option>
                        <option value="Poor">Poor</option>
                        <option value="Average">Average</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>d. Reading Skills:</strong>
                    <select required name="engReadingSkill" class="custom-select" id="inputGroupSelect14" >
                        <option></option>
                        <option value="Poor">Poor</option>
                        <option value="Average">Average</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>12. Your computer literacy (Mark with an “ √ ” to all that applies):</strong><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="computerLiteracy[]" value="Have not used a computer at all">Have not used a computer at all</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="computerLiteracy[]" value="Familiar with browsing the web">Familiar with browsing the web</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="computerLiteracy[]" value="Use email regularly">Use email regularly</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="computerLiteracy[]" value="Ability to use MicrosoftOffice package(Word, Excel,...)">Ability to use MicrosoftOffice package(Word, Excel,...)</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="computerLiteracy[]" value="Used the computer to search for jobs">Used the computer to search for jobs</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="computerLiteracy[]" value="Ability write computer programs">Ability write computer programs</label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>13. Were you involved in any of the following during your university years?</strong>
                    <table id="divFrmRegister" class="table table-bordered form-duration-div">
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Yes</th>
                            <th>If yes, please specify</th>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>1. Extra-curricular activities</td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="extraCurricular" value="No"></td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="extraCurricular" value="Yes"></td>
                                <td>
                                    <input type="text" name="extraCurricularDes" class="form-control" placeholder="">
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>2. Internships/Vocational training</td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="training" value="No"></td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="training" value="Yes"></td>
                                <td>
                                    <input type="text" name="trainingDes" class="form-control" placeholder="">
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>3. Other educational/professional qualifications</td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualifications" value="No"></td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualifications" value="Yes"></td>
                                <td>
                                    <input type="text" name="qualificationsDes" class="form-control" placeholder="">
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>4. Full/part-time employment</td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="employment" value="No"></td>
                                <td><input required style="margin-top: 5px" type="radio" class="flat" name="employment" value="Yes"></td>
                                <td>
                                    <input type="text" name="employmentDes" class="form-control" placeholder="">
                                </td>
                            </div>
                        </tr>
                    </table>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>14. Which sort of area have you lived most of your life?</strong>
                    <select required name="areaLive" class="custom-select" id="inputGroupSelect15" >
                        <option></option>
                        <option value="Urban">Urban</option>
                        <option value="Semi Urban">Semi Urban</option>
                        <option value="Rural">Rural</option>
                        <option value="Foreign country">Foreign country</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <strong>15. Please indicate the area in Sri Lanka that you lived in for most of your life</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>District:</strong>
                    <select required name="districtLife" class="custom-select" id="inputGroupSelect16" >
                        <option></option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>AGA Division</strong>
                    <input required type="text" name="agaDivision" class="form-control" placeholder="AGA Division">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>16. What type of school did you go to for your GCE A/L?</strong>
                    <select required name="alSchool" class="custom-select" id="inputGroupSelect17" >
                        <option></option>
                        <option value="National School">National School</option>
                        <option value="Provincial School">Provincial School</option>
                        <option value="Private/semi govt.school">Private/semi govt.school</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>17. What is the highest level of education achieved by either your father and/or mother??</strong>
                    <select required name="edumf" class="custom-select" id="inputGroupSelect18" >
                        <option></option>
                        <option value="Less than GCE O/L">Less than GCE O/L</option>
                        <option value="Passes GCE O/L">Passes GCE O/L</option>
                        <option value="Passes GCE A/L">Passes GCE A/L</option>
                        <option value="Degree or Equivalent or higher">Degree or Equivalent or higher</option>
                        <option value="Not known">Not known</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>18. To what extent do you agree with the following statements?</strong>
                <table id="divFrmRegister" class="table table-bordered form-duration-div">
                    <tr>
                        <th>Statement</th>
                        <th>Strongly Agree</th>
                        <th>Somewhat Agree</th>
                        <th>Undecided</th>
                        <th>Somewhat Disagree</th>
                        <th>Strongly Disagree</th>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>1. Teaching methods used at the university are effective</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="teachingMethods" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="teachingMethods" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="teachingMethods" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="teachingMethods" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="teachingMethods" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>2. Learning process is suitable for current job environment</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="learningProcess" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="learningProcess" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="learningProcess" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="learningProcess" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="learningProcess" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>3. The quality of lecturers/instructors is good</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfLec" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfLec" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfLec" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfLec" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfLec" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>4. The lab facilities provided are satisfactory</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="labFacilities" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="labFacilities" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="labFacilities" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="labFacilities" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="labFacilities" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>5. The quality of classrooms is good</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfClassrooms" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfClassrooms" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfClassrooms" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfClassrooms" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="qualityOfClassrooms" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>6. The library facilities are satisfactory</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="libraryFacilities" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="libraryFacilities" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="libraryFacilities" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="libraryFacilities" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="libraryFacilities" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>7. IT facilities are satisfactory</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="itFacilities" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="itFacilities" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="itFacilities" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="itFacilities" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="itFacilities" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>8. Practical knowledge is acquired through course work</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalKnowledge" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalKnowledge" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalKnowledge" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalKnowledge" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalKnowledge" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>9. Text books are used in courses taught</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="textBooks" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="textBooks" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="textBooks" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="textBooks" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="textBooks" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>10. Tutorials are used as learning tools</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="tutorials" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="tutorials" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="tutorials" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="tutorials" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="tutorials" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>11. Practical training is a part of the university education</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalTraining" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalTraining" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalTraining" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalTraining" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="practicalTraining" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>12. Research skills are developed during the study period</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="researchSkills" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="researchSkills" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="researchSkills" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="researchSkills" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="researchSkills" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>13. Learning is mostly done by memorizing the lecture notes</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="lecNotes" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="lecNotes" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="lecNotes" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="lecNotes" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="lecNotes" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>14. Workload assigned is very high</td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="workload" value="Strongly Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="workload" value="Somewhat Agree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="workload" value="Undecided"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="workload" value="Somewhat Disagree"></td>
                            <td><input required style="margin-top: 5px" type="radio" class="flat" name="workload" value="Strongly Disagree"></td>
                        </div>
                    </tr>

                </table>

            </div>

            <strong>19. Indicate the names of the Lecturer / Professor(s) who have helped you most during your university education.</strong>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Quality communication at lectures or laboratories</strong>
                    <input type="text" name="qualityCommunication" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Helpful teaching material</strong>
                    <input type="text" name="helpfulTeachingMaterial" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>c. Promotion of interaction through group work</strong>
                    <input type="text" name="promotionOfInteraction" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>d. Assignment and feedback given</strong>
                    <input type="text" name="assignmentAndFeedback" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>e. Supervision of project work</strong>
                    <input type="text" name="supervisionOfProjectWork" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>f. Mentoring and being a role model</strong>
                    <input type="text" name="monitoringRoleModel" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>20. How much did you expect your gross monthly salary(In Rupees) to be after your university education?</strong>
                    <select required name="monthlySalary" class="custom-select" id="inputGroupSelect19" >
                        <option></option>
                        <option value="Less than 10,000">Less than 10,000</option>
                        <option value="10,000-14,999">10,000-14,999</option>
                        <option value="15,000-19,999">15,000-19,999</option>
                        <option value="20,000-24,999">20,000-24,999</option>
                        <option value="25,000-29,999">25,000-29,999</option>
                        <option value="30,000-34,999">30,000-34,999</option>
                        <option value="35,000-39,999">35,000-39,999</option>
                        <option value="40,000-44,999">40,000-44,999</option>
                        <option value="45,000-49,999">45,000-49,999</option>
                        <option value="50,000-59,999">50,000-59,999</option>
                        <option value="60,000-75,000">60,000-75,000</option>
                        <option value="over 75,000">over 75,000</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>21. Which of the following describes your situation after your university education?(Mark with an “ √ ” to all that applies)</strong><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I have a temporary job">I have a temporary job</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I am employed now">I am employed now</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I have not looked for a job">I have not looked for a job</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I have looked for a job, but have not found one yet">I have looked for a job, but have not found one yet</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I have a better job now">I have a better job now</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I received a promotion">I received a promotion</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I'm continuing with the same job that I had during the university years">I'm continuing with the same job that I had during the university years</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I'm continuing with further studies">I'm continuing with further studies</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I'm self-employed">I'm self-employed</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="situationAfterUniversityEduction[]" value="I'm employed now but am looking for a better job">I'm employed now but am looking for a better job</label><br>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>22. When was your last university exam?</strong>
                    <div class='input-group date' id='lastExamDatePicker'>
                        <input placeholder="MM/YYYY" required name="lastExamDate" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    $('#lastExamDatePicker').datepicker({
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
            <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>23. Which sector(s) are you willing to be employed in? (Mark to all that applies)</strong><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="Private Sector">Private Sector</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="Public Sector, teaching">Public Sector, teaching</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="Public Sector, other">Public Sector, other</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="Self-Employed">Self-Employed</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="Semi Government Sector">Semi Government Sector</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="University Staff">University Staff</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="sectorsWillingEmployee[]" value="Other">Other</label><br>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>24. Were you employed at any point after your last exam?</strong>
                    <select required name="employedAfterLastExam" class="custom-select" id="inputGroupSelect20" >
                        <option></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <strong>If Yes</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. How long did you wait to get your first job after the last day of final exam? (Please enter the number of months)</strong>
                    <input type="text" name="waitedDaysForFirstJob" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. What is the date of your first appointment?</strong>
                    <div class='input-group date' id='firstAppointmentPicker'>
                        <input placeholder="MM/DD/YYYY" name="firstAppointment" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    $('#firstAppointmentPicker').datepicker({
                        format: "mm/dd/yyyy",
                        // viewMode: "dates",
                        // minViewMode: "dates",
                        weekStart: 0,
                        calendarWeeks: true,
                        autoclose: true,
                        todayHighlight: true,
                        orientation: "auto",

                    });
                });
            </script>
            <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>25. What is your current employment status?</strong>
                    <select required name="currentEmploymentStatus" class="custom-select" id="inputGroupSelect21" >
                        <option></option>
                        <option value="Permanent Employment">Permanent Employment</option>
                        <option value="Temporary/Contract Employment">Temporary/Contract Employment</option>
                        <option value="Self employed">Self employed</option>
                        <option value="Not looking for a job">Not looking for a job</option>
                        <option value="Continuing highest studies">Continuing highest studies</option>
                        <option value="Not employed">Not employed</option>
                    </select>
                </div>
            </div>

            <hr/>

            <div class="pull-left">
                <h5 style="font-weight: bold">Answer question 26-37 ONLY if you are currently Permanent/Temporary/Contract employed or Self employed otherwise skip to question 37</h5>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>26. Type of employment</strong>
                    <select name="typeEmployemt" class="custom-select" id="inputGroupSelect22" >
                        <option></option>
                        <option value="Permanent Employment">Permanent Employment</option>
                        <option value="Temporary/Contract Employment">Temporary/Contract Employment</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>27. Name of the organization currently employed:</strong>
                    <input type="text" name="organizationCurrentlyEmployed" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>28. Which sector are you employed in?</strong>
                    <select name="sectorEmployed" class="custom-select" id="inputGroupSelect23" >
                        <option></option>
                        <option value="Public Sector">Public Sector</option>
                        <option value="Private Sector">Private Sector</option>
                        <option value="Semi Government">Semi Government</option>
                        <option value="Self Employed">Self Employed</option>
                        <option value="Foreign">Foreign</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>29. The position you hold currently?</strong>
                    <select name="currentPosition" class="custom-select" id="inputGroupSelect24" >
                        <option></option>
                        <option value="Senior Management">Senior Management</option>
                        <option value="Senior Management">Senior Management</option>
                        <option value="Senior Management">Senior Management</option>
                        <option value="Management Trainee">Management Trainee</option>
                        <option value="Support Staff (Clerical/Secretarial)">Support Staff (Clerical/Secretarial)</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Entrepreneur">Entrepreneur</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>30. To which economic sector does your current job belong to?</strong>
                    <select name="jobEconomicSector" class="custom-select" id="inputGroupSelect25" >
                        <option></option>
                        <option value="Agriculture/Dairy">Agriculture/Dairy</option>
                        <option value="Bank Finance/Insurance">Bank Finance/Insurance</option>
                        <option value="Construction/ Engineering">Construction/ Engineering</option>
                        <option value="Education">Education</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Health care">Health care</option>
                        <option value="Hotels/Travels/Tourism">Hotels/Travels/Tourism</option>
                        <option value="IT">IT</option>
                        <option value="Power and Energy">Power and Energy</option>
                        <option value="Telecommunication">Telecommunication</option>
                        <option value="Trade">Trade</option>
                        <option value="Plantation">Plantation</option>
                        <option value="Public Administration & Defence">Public Administration & Defence</option>
                        <option value="Professional, Scientific & technical">Professional, Scientific & technical</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>31. What is your current gross monthly salary (In Rupees)?</strong>
                    <select name="currentGrossMonthlySalary" class="custom-select" id="inputGroupSelect26" >
                        <option></option>
                        <option value="Less than 20,000">Less than 20,000</option>
                        <option value="20,000-29,999">20,000-29,999</option>
                        <option value="30,000-39,999">30,000-39,999</option>
                        <option value="40,000-49,999">40,000-49,999</option>
                        <option value="50,000-59,999">50,000-59,999</option>
                        <option value="60,000-75,000">60,000-75,000</option>
                        <option value="over 75,000">over 75,000</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>32. How did you find this job?</strong>
                    <select name="findTheJob" class="custom-select" id="inputGroupSelect27" >
                        <option></option>
                        <option value="Newspaper">Newspaper</option>
                        <option value="Gazette">Gazette</option>
                        <option value="Online">Online</option>
                        <option value="Personal contact">Personal contact</option>
                        <option value="Competitive Exam">Competitive Exam</option>
                        <option value="Continuing with the same job held during university education">Continuing with the same job held during university education</option>
                        <option value="Via Internship">Via Internship</option>
                        <option value="Via University">Via University</option>
                        <option value="Job fair/career guidance">Job fair/career guidance</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>33. What do you think were the most important aspects in getting this job? (Check all that applies)</strong><Br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Degree">Degree</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Class of degree">Class of degree</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Reputation of university">Reputation of university</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Field of study">Field of study</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Research experience">Research experience</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Personal contacts">Personal <contacts></contacts></label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Previous work experience">Previous work experience</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="English proficiency">English proficiency</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Other professional qualifications">Other professional qualifications</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Your personality">Your personality</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Computer Literacy">Computer Literacy</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="aspectsInGettingJob[]" value="Other">Other</label><br>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>34. Is this job related to the field you studies in your degree?</strong>
                    <select name="jobRelatedDegree" class="custom-select" id="inputGroupSelect28" >
                        <option></option>
                        <option value="Very Related">Very Related</option>
                        <option value="Somewhat related">Somewhat related</option>
                        <option value="Neither related nor unrelated">Neither related nor unrelated</option>
                        <option value="Somewhat unrelated">Somewhat unrelated</option>
                        <option value="Very unrelated">Very unrelated</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>35. When did you find your current job?</strong>
                    <select name="whenFIndCurrentJob" class="custom-select" id="inputGroupSelect28" >
                        <option></option>
                        <option value="During the University">During the University</option>
                        <option value="After sitting the final exam">After sitting the final exam</option>
                        <option value="After releasing the result">After releasing the result</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>36. How satisfied are you with your current job?</strong>
                    <select name="satisfiedCurrentJob" class="custom-select" id="inputGroupSelect28" >
                        <option></option>
                        <option value="Very Satisfied">Very Satisfied</option>
                        <option value="Somewhat Satisfied">Somewhat Satisfied</option>
                        <option value="Neither Satisfied nor dissatisfied">Neither Satisfied nor dissatisfied</option>
                        <option value="Somewhat dissatisfied">Somewhat dissatisfied</option>
                        <option value="Very dissatisfied">Very dissatisfied</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>37. How long have you been waited to get this job since the effecive date of your degree?</strong>
                    <select name="howLongWaitedToGetJob" class="custom-select" id="inputGroupSelect29" >
                        <option></option>
                        <option value="Less than 3 months">Less than 3 months</option>
                        <option value="3-6 months">3-6 months</option>
                        <option value="6-9 months">6-9 months</option>
                        <option value="9-12 months">9-12 months</option>
                        <option value="More than one year">More than one year</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>38. Are looking for employment right now?</strong>
                    <select required name="lookingNowEmployee" class="custom-select" id="inputGroupSelect30" >
                        <option></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>If no, please indicate the reason(s) and skip to 40)</strong>
                    <input type="text" name="indicateReason" class="form-control" placeholder="Please indicate the reason(s)...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>39. What do you think are the main obstacles for you to get a job? Please give details</strong>
                    <input type="text" name="obstaclesForJob" class="form-control" placeholder="">
                </div>
            </div>


            <strong>40. Are you willing to do any of the following in order to find a job?</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Accept a job that is not in the field you stuied at the university</strong>
                    <select required name="willingToFindJob" class="custom-select" id="inputGroupSelect30" >
                        <option></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Move if a job requires it</strong>
                    <select required name="jobRequest" class="custom-select" id="inputGroupSelect31" >
                        <option></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>c. Accept a job that you are over-qualified for</strong>
                    <select required name="jobOverQualified" class="custom-select" id="inputGroupSelect32" >
                        <option></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>41. What are the career goals for the next two years? (Mark with to all that applies)</strong><Br>
                    <label><input style="margin-right: 50px" type="checkbox" name="careerGoalsNextTwoYears[]" value="Find a better job">Find a better job</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="careerGoalsNextTwoYears[]" value="Migration">Migration</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="careerGoalsNextTwoYears[]" value="Further studies">Further studies</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="careerGoalsNextTwoYears[]" value="Find a job">Find a job</label><br>
                    <label><input style="margin-right: 50px" type="checkbox" name="careerGoalsNextTwoYears[]" value="Other">Other</label><br>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>42. How satisfied are you with your university education?</strong>
                    <select required name="universityEducation" class="custom-select" id="inputGroupSelect33" >
                        <option></option>
                        <option value="Very Satisfied">Very Satisfied</option>
                        <option value="Somewhat Satisfied">Somewhat Satisfied</option>
                        <option value="Neither Satisfied nor dissatisfied">Neither Satisfied nor dissatisfied</option>
                        <option value="Somewhat dissatisfied">Somewhat dissatisfied</option>
                        <option value="Very dissatisfied">Very dissatisfied</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>43. What do you think could be done to facilitate the first employment after graduation?</strong>
                    <input required type="text" name="employmentAfterGraduation" class="form-control" placeholder="">
                </div>
            </div>

            {{--            =======================--}}




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


            @endif
            @endforeach

        </div>

    </form>
    </div>
    <div style="margin-bottom:50px;margin-top: -30px" class="row">
        <div class="col-xs-11 col-sm-11 col-md-11 text-center">
        </div>
        <div  class="col-xs-1 col-sm-1 col-md-1">
            <button class="btn btn-dark" onclick="document.getElementById('selectSurveyForm').reset(); document.getElementById('from').value = null; return false;">
                Reset
            </button>
        </div>
    </div>
@endsection
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

            {{-- SECTION A – GENERAL INFORMATION --}}
<h4>Section A - General Information</h4>

<div class="form-group">
    <label for="regNum">1. Student Registration No:</label>
    <input type="text" id="regNum" name="regNum" class="form-control" required>
</div>

<div class="form-group">
    <label for="email">2. Email address:</label>
    <input type="email" id="email" name="email" class="form-control" required>
</div>

<div class="form-group">
    <label for="contactNumber">3. Contact number:</label>
    <input type="text" id="contactNumber" name="contactNumber" class="form-control" required>
</div>

<div class="form-group">
    <label>4. Gender:</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderM" value="Male" required>
        <label class="form-check-label" for="genderM">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderF" value="Female">
        <label class="form-check-label" for="genderF">Female</label>
    </div>
</div>

<div class="form-group">
    <label for="age">5. Age:</label>
    <input type="number" id="age" name="age" class="form-control" required>
</div>

<div class="form-row">
    <div class="col">
        <label>6. GCE A/L Examination</label>
        <select name="al_stream" class="form-control" required>
            <option value="">Select stream</option>
            <option value="Bio-science">Bio-science</option>
            <option value="Physical Science">Physical Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Arts">Arts</option>
            <option value="Technology">Technology</option>
        </select>
    </div>
    <div class="col">
        <label>District:</label>
        <select name="al_district" class="form-control" required>
            <option value="">Select district</option>
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
    <div class="col">
        <label>Z-score / Aggregate:</label>
        <input type="text" name="al_zscore" class="form-control" required>
    </div>
    <div class="col">
        <label>Year:</label>
        <input type="number" name="al_year" class="form-control" required>
    </div>
</div>

<div class="mt-3">
    <label>7. English Language Proficiency</label>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Exam</th>
                <th>A</th><th>B</th><th>C</th><th>S</th><th>F/W</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>GCE O/L English</td>
                <td><input type="radio" name="ol_english" value="A" required></td>
                <td><input type="radio" name="ol_english" value="B"></td>
                <td><input type="radio" name="ol_english" value="C"></td>
                <td><input type="radio" name="ol_english" value="S"></td>
                <td><input type="radio" name="ol_english" value="F/W"></td>
            </tr>
            <tr>
                <td>GCE A/L General English</td>
                <td><input type="radio" name="al_english" value="A" required></td>
                <td><input type="radio" name="al_english" value="B"></td>
                <td><input type="radio" name="al_english" value="C"></td>
                <td><input type="radio" name="al_english" value="S"></td>
                <td><input type="radio" name="al_english" value="F/W"></td>
            </tr>
        </tbody>
    </table>
</div>

            {{--            =======================--}}
{{-- SECTION B – ACADEMIC INFORMATION --}}
<h4 class="mt-4">Section B - Academic Information</h4>

<div class="form-row">
    <div class="col">
        <label for="faculty">8. Faculty:</label>
        {{-- <input type="text" id="faculty" name="faculty" class="form-control" required> --}}
        <select name="faculty" class="form-control" required>
        <option value="" disabled selected>Select</option>
        <option value="Management Studies">Management Studies</option>
        <option value="Social Sciences & Languages">Social Sciences & Languages</option>
        <option value="Applied Sciences">Applied Sciences</option>
        <option value="Agricultural Sciences">Agricultural Sciences</option>
        <option value="Geomatics">Geomatics</option>
        <option value="Medicine">Medicine</option>
        <option value="Technology">Technology</option>
        <option value="Computing">Computing</option>
    </select>
    </div>
    <div class="col">
        <label for="department">9. Department:</label>
        <input type="text" id="department" name="department" class="form-control" required>
    </div>
</div>

<div class="form-group mt-3">
    <label for="programme">10. Name of Degree Programme:</label>
    <input type="text" id="programme" name="degree_programme" class="form-control" required>
</div>

<div class="form-group">
    <label>11. Type of Degree Programme:</label>
    <select name="degree_type" class="form-control" required>
        <option value="" disabled selected>Select</option>
        <option value="General">General</option>
        <option value="Honours">Honours</option>
    </select>
</div>

<div class="form-group">
    <label>12. Medium of Instruction:</label>
    <select name="medium" class="form-control" required>
        <option value="" disabled selected>Select</option>
        <option value="English">English</option>
        <option value="Sinhala">Sinhala</option>
    </select>
</div>

<div class="form-group">
    <label>13. Class Obtained:</label>
    <select name="class_obtained" class="form-control" required>
        <option value="" disabled selected>Select</option>
        <option value="First Class">First Class</option>
        <option value="Second Upper">Second Upper</option>
        <option value="Second Lower">Second Lower</option>
        <option value="General Pass">General Pass</option>
    </select>
</div>

<div class="mt-3">
    <label>14. English proficiency at university level:</label>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Poor</th>
                <th>Average</th>
                <th>Moderate</th>
                <th>Good</th>
                <th>Excellent</th>
            </tr>
        </thead>
        <tbody>
            @foreach(['Speaking'=>'eng_speaking','Listening'=>'eng_listening','Writing'=>'eng_writing','Reading'=>'eng_reading'] as $label=>$field)
            <tr>
                <td>{{ $label }}</td>
                @foreach(['Poor','Average','Moderate','Good','Excellent'] as $level)
                <td><input type="radio" name="{{ $field }}" value="{{ $level }}" required></td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="form-group">
    <label>15. Rate your computer literacy level:</label>
    <select name="computer_literacy_level" class="form-control" required>
        <option value="" disabled selected>Select</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Moderate">Moderate</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
    </select>
</div>

<div class="mt-3">
    <label>16. Computer-related abilities:</label><br>
    @foreach([
        'Email Communication'=>'email_comm',
        'Handling Databases'=>'databases',
        'Spreadsheets & Word Docs'=>'office_docs',
        'Website Design'=>'web_design',
        'Write Computer Programs'=>'programming'
    ] as $label=>$name)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $label }}">
        <label class="form-check-label">{{ $label }}</label>
    </div>
    @endforeach
</div>

<div class="mt-3">
    <label>17. Internship Training component:</label>
    <div class="form-group">
        <label>17A. Was there an Internship?</label>
        <select name="internship_yesno" class="form-control" required>
            <option value="" disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>
    <div class="form-row">
        <div class="col">
            <label>Duration:</label>
            <select name="internship_duration" class="form-control">
                <option value="" disabled selected>Select</option>
                <option value="0-3 months">0-3 months</option>
                <option value="3-6 months">3-6 months</option>
                <option value="6-9 months">6-9 months</option>
                <option value="9-11 months">9-11 months</option>
            </select>
        </div>
        <div class="col">
            <label>Graded?</label>
            <select name="internship_graded" class="form-control">
                <option value="" disabled selected>Select</option>
                <option value="Compulsory with GPA">Compulsory with GPA</option>
                <option value="Compulsory without GPA">Compulsory without GPA</option>
                <option value="Elective with GPA">Elective with GPA</option>
                <option value="Elective without GPA">Elective without GPA</option>
            </select>
        </div>
        <div class="col">
            <label>Semester/Year:</label>
            <input type="text" name="internship_semester" class="form-control" placeholder="e.g., 3rd Year, Sem I">
        </div>
    </div>
</div>

<div class="mt-3">
    <label>18. Other professional courses while studying:</label>
    <div class="form-group">
        <label>18A. Followed any other courses?</label>
        <select name="other_courses_yesno" class="form-control" required>
            <option value="" disabled selected>Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>
    <div class="form-row">
        <div class="col">
            <label>Type of course:</label>
            <select name="other_course_type" class="form-control">
                <option value="" disabled selected>Select</option>
                <option value="NVQ">NVQ</option>
                <option value="Certificate">Certificate</option>
                <option value="Diploma">Diploma</option>
                <option value="Higher Diploma+">Higher Diploma+</option>
            </select>
        </div>
        <div class="col">
            <label>Completed?</label>
            <select name="other_course_completed" class="form-control">
                <option value="" disabled selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col">
            <label>Field:</label>
            <select name="other_course_field" class="form-control">
                <option value="" disabled selected>Select</option>
                <option value="IT & Digital Skills">IT & Digital Skills</option>
                <option value="Business & Management">Business & Management</option>
                <option value="Language & Communication">Language & Communication</option>
                <option value="Engineering & Technology">Engineering & Technology</option>
                <option value="Health & Medicine">Health & Medicine</option>
                <option value="Education & Teaching">Education & Teaching</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
    </div>
    <div class="form-group mt-2">
            <label>Were you involved in any extracurricular activities?</label>
            <select name="extra_activities_yesno" class="form-control">
                <option value="" disabled selected>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    <div class="form-group mt-2">
        <label>18E. Extracurricular activities:</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="extra_activities[]" value="Sports">
            <label class="form-check-label">Sports</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="extra_activities[]" value="Art & Performances">
            <label class="form-check-label">Art & Performances</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="extra_activities[]" value="Clubs & Societies">
            <label class="form-check-label">Clubs & Societies</label>
        </div>
        <input type="text" name="extra_activities_other" class="form-control mt-2" placeholder="Other (please specify)">
    </div>
</div>

<div class="form-group mt-4">
    <label>19. Current employment status:</label>
    <select name="employment_status" class="form-control" required>
        <option value="" disabled selected>Select</option>
        <option value="Employed">Employed</option>
        <option value="Unemployed">Unemployed</option>
        <option value="Not in the Labor Force">Not in the Labor Force</option>
    </select>
</div>
            {{--            =======================--}}
{{-- SECTION C – EMPLOYMENT INFORMATION --}}
<h4 class="mt-5">Section C - Employment Information</h4>

<div class="form-group">
  <label>20. Are you an Employee / Employer / Self-employment / Family worker?</label>
  <select name="employment_type" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Employee">Employee</option>
    <option value="Employer">Employer</option>
    <option value="Self-employment">Self-employment</option>
    <option value="Contributing Family Worker">Contributing Family Worker</option>
  </select>
</div>

<div class="form-group">
  <label>21. Employment permanence:</label>
  <select name="employment_permanence" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Permanent">Permanent</option>
    <option value="Temporary">Temporary</option>
    <option value="Casual">Casual</option>
    <option value="No permanent employer">No permanent employer</option>
  </select>
</div>

<div class="form-group">
  <label>22. Sector of employer:</label>
  <select name="employer_sector" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Government">Government</option>
    <option value="Semi Government">Semi Government</option>
    <option value="Private">Private</option>
    <option value="Self">Self</option>
    <option value="Foreign">Foreign</option>
  </select>
</div>

<div class="form-group">
  <label for="employerName">23. Name of institution:</label>
  <input type="text" id="employerName" name="employer_name" class="form-control">
</div>

<div class="form-group">
  <label>24. Occupation category:</label>
  <select name="occupation_category" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Managers">Managers</option>
    <option value="Professionals">Professionals</option>
    <option value="Technicians & Associate Professionals">Technicians & Associate Professionals</option>
    <option value="Clerical Support Workers">Clerical Support Workers</option>
    <option value="Service & Sales Workers">Service & Sales Workers</option>
    <option value="Skilled Agricultural, Forestry & Fishery Workers">Skilled Agricultural, Forestry & Fishery Workers</option>
    <option value="Craft & Trades Workers">Craft & Trades Workers</option>
    <option value="Operators & Assemblers">Operators & Assemblers</option>
    <option value="Elementary Occupations">Elementary Occupations</option>
    <option value="Armed Forces">Armed Forces</option>
    <option value="Other">Other</option>
  </select>
</div>

<div class="form-group">
  <label>25. Economic sector:</label>
  <select name="job_economic_sector" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Agriculture, Forestry & Fishing">Agriculture, Forestry & Fishing</option>
    <option value="Mining & Quarrying">Mining & Quarrying</option>
    <option value="Manufacturing">Manufacturing</option>
    <option value="Electricity, Gas & Air Conditioning">Electricity, Gas & Air Conditioning</option>
    <option value="Water Supply & Waste Management">Water Supply & Waste Management</option>
    <option value="Construction">Construction</option>
    <option value="Wholesale & Retail Trade">Wholesale & Retail Trade</option>
    <option value="Transportation & Storage">Transportation & Storage</option>
    <option value="Accommodation & Food Services">Accommodation & Food Services</option>
    <option value="Information & Communication">Information & Communication</option>
    <option value="Financial & Insurance">Financial & Insurance</option>
    <option value="Real Estate">Real Estate</option>
    <option value="Professional, Scientific & Technical">Professional, Scientific & Technical</option>
    <option value="Administrative & Support Services">Administrative & Support Services</option>
    <option value="Public Administration & Defence">Public Administration & Defence</option>
    <option value="Education">Education</option>
    <option value="Health & Social Work">Health & Social Work</option>
    <option value="Arts, Entertainment & Recreation">Arts, Entertainment & Recreation</option>
    <option value="Other">Other</option>
  </select>
</div>

<div class="form-row">
  <div class="col">
    <label>26. When did you find your current job?</label>
    <select name="when_found_job" class="form-control">
      <option value="" disabled selected>Select</option>
      <option value="During University">During University</option>
      <option value="After final exam">After final exam</option>
      <option value="After result release">After result release</option>
    </select>
  </div>
  <div class="col">
    <label>27. Related to your field?</label>
    <select name="job_field_match" class="form-control">
      <option value="" disabled selected>Select</option>
      <option value="Yes, fully">Yes, fully</option>
      <option value="Partially">Partially</option>
      <option value="No">No, my education level is higher than required</option>
    </select>
  </div>
</div>

<div class="form-group mt-3">
  <label>28. Use of university-acquired skills:</label>
  <select name="use_skills" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Always">Always</option>
    <option value="Frequently">Frequently</option>
    <option value="Occasionally">Occasionally</option>
    <option value="Rarely">Rarely</option>
    <option value="Never">Never</option>
  </select>
</div>

<div class="form-row">
  <div class="col">
    <label>29. Took job outside field due to lack of opportunities?</label>
    <select name="outside_field_due" class="form-control">
      <option value="" disabled selected>Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>
  <div class="col">
    <label>30. Salary vs expectations:</label>
    <select name="salary_expectation" class="form-control">
      <option value="" disabled selected>Select</option>
      <option value="Exceeds">Exceeds expectations</option>
      <option value="Matches">Matches expectations</option>
      <option value="Below">Below expectations</option>
      <option value="Significantly below">Significantly below expectations</option>
    </select>
  </div>
</div>

<div class="form-row mt-3">
  <div class="col">
    <label>31. Gross monthly salary:</label>
    <select name="gross_salary" class="form-control">
      <option value="" disabled selected>Select</option>
      <option value="below 50,000">below 50,000</option>
      <option value="50,000-100,000">50,000-100,000</option>
      <option value="101,000-150,000">101,000-150,000</option>
      <option value="151,000-200,000">151,000-200,000</option>
      <option value="above 200,000">above 200,000</option>
    </select>
  </div>
  <div class="col">
    <label>32. Career growth satisfaction:</label>
    <select name="career_growth_sat" class="form-control">
      <option value="" disabled selected>Select</option>
      <option value="Very satisfied">Very satisfied</option>
      <option value="Somewhat satisfied">Somewhat satisfied</option>
      <option value="Neutral">Neutral</option>
      <option value="Somewhat dissatisfied">Somewhat dissatisfied</option>
      <option value="Very dissatisfied">Very dissatisfied</option>
    </select>
  </div>
</div>

<div class="form-group mt-3">
  <label>33. Considering job change due to underemployment?</label>
  <select name="consider_change" class="form-control">
    <option value="" disabled selected>Select</option>
    <option value="Yes, actively searching">Yes, actively searching</option>
    <option value="Yes, but not actively">Yes, but not actively</option>
    <option value="No">No</option>
  </select>
</div>

            {{--            =======================--}}
<p class="bg-warning text-dark p-3 mb-0 rounded">
            If you are not having any employment, please provide information to section D.
        </p>
{{-- SECTION D – Unemployment Information --}}
<h4 class="mt-5">Section D - Unemployment Information</h4>

<div class="form-group">
    <label>34. Reasons for unemployment (select all that apply):</label><br>
    @foreach([
        'Lack of Relevant Skills',
        'Limited Job Opportunities',
        'Lack of Work Experience',
        'High Salary Expectations',
        'Over qualification',
        'Poor economic conditions',
        'Weak Professional Networks',
        'Mismatch Between Degree & Industry Needs',
        'Other'
    ] as $reason)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="unemp_reasons[]" value="{{ $reason }}">
        <label class="form-check-label">{{ $reason }}</label>
    </div>
    @endforeach
    <input type="text" name="unemp_reasons_other" class="form-control mt-2" placeholder="Other (please specify)">
</div>

<div class="form-row">
    <div class="col">
        <label>35. Expected employment type:</label>
        <select name="future_employment_type" class="form-control">
            <option value="" disabled selected>Select</option>
            <option value=">Self-employment">Self-employment</option>
            <option value="Paid employment">Paid employment</option>
            <option value="Any">Any</option>
        </select>
    </div>
    <div class="col">
        <label>36. Expected job sector:</label>
        <select name="expected_sector" class="form-control">
            <option value="" disabled selected>Select</option>
            <option value="Public">Public sector</option>
            <option value="Semi Government">Semi Government sector</option>
            <option value="Private">Private sector</option>
            <option value="Any">Any sector</option>
        </select>
    </div>
</div>

<div class="form-group mt-3">
    <label>37. Did you take any steps in the last 4 weeks to find work or start self-employment?</label>
    <select name="took_steps" class="form-control">
        <option value="" disabled selected>Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
</div>

<div class="form-group">
    <label>38. Steps taken (select up to three):</label><br>
    @foreach([
        'Registered for government job',
        'Registered in private/Internet',
        'Replying to ads',
        'Networking',
        'Preparing for self-employment resources',
        'Other'
    ] as $step)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="job_search_steps[]" value="{{ $step }}">
        <label class="form-check-label">{{ $step }}</label>
    </div>
    @endforeach
    <input type="text" name="job_search_steps_other" class="form-control mt-2" placeholder="Other (please specify)">
</div>

<div class="form-group">
    <label>39. Minimum salary expected (reservation wage):</label>
    <select name="reservation_wage" class="form-control">
        <option value="" disabled selected>Select</option>
        <option value="<= 50,000">&le; 50,000</option>
        <option value="50,001-100,000">50,001-100,000</option>
        <option value="100,001-150,000">100,001-150,000</option>
        <option value="150,001-200,000">150,001-200,000</option>
        <option value="> 200,000">> 200,000</option>
    </select>
</div>

<div class="form-group">
    <label>40. Expected occupation:</label>
    <select name="expected_occupation" class="form-control">
        <option value="" disabled selected>Select</option>
        @foreach([
            'Managers',
            'Professionals',
            'Technicians & Associate Professionals',
            'Clerical Support Workers',
            'Service & Sales Workers',
            'Skilled Agricultural, Forestry & Fishery Workers',
            'Craft & Related Trades Workers',
            'Plant & Machine Operators & Assemblers',
            'Elementary Occupations',
            'Armed Forces Occupations',
            'Other'
        ] as $occupation)
        <option value="{{ $occupation }}">{{ $occupation }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>41. Expected economic sector:</label>
    <select name="expected_job_economic_sector" class="form-control">
        <option value="" disabled selected>Select</option>
        @foreach([
            'Agriculture, Forestry & Fishing',
            'Mining & Quarrying',
            'Manufacturing',
            'Electricity, Gas & Air Conditioning',
            'Water Supply & Waste Management',
            'Construction',
            'Wholesale & Retail Trade',
            'Transportation & Storage',
            'Accommodation & Food Services',
            'Information & Communication',
            'Financial & Insurance',
            'Real Estate',
            'Professional, Scientific & Technical',
            'Administrative & Support Services',
            'Public Administration & Defence',
            'Education',
            'Health & Social Work',
            'Arts, Entertainment & Recreation',
            'Other'
        ] as $sector)
        <option value="{{ $sector }}">{{ $sector }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>42. How long have you been looking for a job after graduation? (months)</label>
    <input type="number" name="job_search_duration" class="form-control" placeholder="Number of months">
</div>

            {{--            =======================--}}

{{-- SECTION E – GENERAL COMMENTS --}}
<h4 class="mt-5">Section E - General Comments</h4>

<div class="form-group">
  <label>43. What are your career goals for the next two years? (Select all that apply)</label><br>
  @foreach([
    'Find a better job',
    'Migration',
    'Further studies',
    'Find a job',
    'Other'
  ] as $goal)
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="career_goals[]" value="{{ $goal }}">
      <label class="form-check-label">{{ $goal }}</label>
    </div>
  @endforeach
  <input type="text" name="career_goals_other" class="form-control mt-2" placeholder="Other (please specify)">
</div>

<div class="form-group">
  <label>44. How satisfied are you with your university education?</label>
  <select name="university_satisfaction" class="form-control" required>
    <option value="" disabled selected>Select</option>
    <option value="Very satisfied">Very satisfied</option>
    <option value="Somewhat satisfied">Somewhat satisfied</option>
    <option value="Neither satisfied nor dissatisfied">Neither satisfied nor dissatisfied</option>
    <option value="Somewhat dissatisfied">Somewhat dissatisfied</option>
    <option value="Very dissatisfied">Very dissatisfied</option>
  </select>
</div>

<div class="form-group">
  <label>45. If you are dissatisfied, please provide reasons for your answer.</label>
  <textarea name="dissatisfaction_reasons" class="form-control" rows="3" placeholder="Your reasons..."></textarea>
</div>

<div class="mt-3">
  <label>46. Comment on the following statements:</label>
  <div class="table-responsive mb-4">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Statement</th>
          <th>Very satisfied</th>
          <th>Somewhat satisfied</th>
          <th>Neither</th>
          <th>Somewhat dissatisfied</th>
          <th>Very dissatisfied</th>
        </tr>
      </thead>
      <tbody>
        @foreach([
          'Teaching methods used at the university are effective'        => 'teaching_methods',
          'Learning process is suitable for current job environment'      => 'learning_process',
          'The quality of lecturers/instructors is good'                 => 'lecturer_quality',
          'The lab facilities provided are satisfactory'                 => 'lab_facilities',
          'The quality of classrooms is good'                            => 'classroom_quality',
          'The library facilities are satisfactory'                      => 'library_facilities',
          'IT facilities are satisfactory'                               => 'it_facilities',
          'Workload assigned is fine'                                    => 'workload'
        ] as $text => $field)
          <tr>
            <td>{{ $text }}</td>
            @foreach(['Very satisfied','Somewhat satisfied','Neither','Somewhat dissatisfied','Very dissatisfied'] as $level)
              <td><input type="radio" name="{{ $field }}" value="{{ $level }}" required></td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="form-group">
  <label>47. When was your last university exam?</label>
  <input type="text" id="lastExamPicker" name="last_university_exam" class="form-control" placeholder="MM/YYYY" required>
</div>

<div class="form-group">
  <label>48. What do you think could be done to facilitate the first employment after graduation?</label>
  <textarea name="facilitate_employment" class="form-control" rows="3" placeholder="Your suggestions..." required></textarea>
</div>

<div class="form-group">
  <label>49. Any other comments.</label>
  <textarea name="other_comments" class="form-control" rows="3" placeholder="Other comments..." required></textarea>
</div>

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
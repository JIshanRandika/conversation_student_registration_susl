<?php

namespace App\Http\Controllers;

use App\Exports\SurveyExport;
use App\Models\Convocation;
use App\Models\EligibleStudent;
// use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey_responses = SurveyResponse::all();
        $convo = Convocation::all()->pluck('convocation', 'id');
        return view('survey.index',compact('survey_responses', 'convo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('surveyView')
            ->with('success','Complete the Survey to Complete Registration.');
    }

    public function surveyView()
    {
        $eligibleStudents = EligibleStudent::all();
        return view('survey.create',compact('eligibleStudents'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        Survey::create($request->all());

//        $input = $request->all();
//        $input['careerGoalsNextTwoYears'] = $request->input('careerGoalsNextTwoYears');
//        Survey::create($input);

//

        $pro=new SurveyResponse();
        $pro->regNum = $request->regNum;
        $pro->email = $request->email;
        $pro->contactNumber = $request->contactNumber;
        $pro->gender = $request->gender;
        $pro->age = $request->age;
        $pro->al_stream = $request->al_stream;
        $pro->al_district = $request->al_district;
        $pro->al_zscore = $request->al_zscore;
        $pro->al_year = $request->al_year;
        $pro->ol_english = $request->ol_english;
        $pro->al_english = $request->al_english;
        //section B
        // $pro->ethnicity = $request->ethnicity;
        $pro->faculty = $request->faculty;
        $pro->department = $request->department;
        // $pro->degreeFall = $request->degreeFall;
        $pro->degree_programme = $request->degree_programme;
        $pro->degree_type = $request->degree_type;
        $pro->medium = $request->medium;
        // $pro->specialization = $request->specialization;
        $pro->class_obtained = $request->class_obtained;
        $pro->eng_speaking = $request->eng_speaking;
        $pro->eng_listening = $request->eng_listening;
        $pro->eng_writing = $request->eng_writing;
        $pro->eng_reading = $request->eng_reading;

        
        $pro->computer_literacy_level = $request->computer_literacy_level;
        $pro->abilities = json_encode($request->abilities);
        $pro->internship_yesno = $request->internship_yesno;
        $pro->internship_duration = $request->internship_duration;
        $pro->internship_graded = $request->internship_graded;
        $pro->internship_semester = $request->internship_semester;
        $pro->other_courses_yesno = $request->other_courses_yesno;
        $pro->other_course_type = $request->other_course_type;
        $pro->other_course_completed = $request->other_course_completed;
        $pro->other_course_field = $request->other_course_field;
        $pro->extra_activities_yesno = $request->extra_activities_yesno;
        $pro->extra_activities = json_encode($request->extra_activities);
        // $pro->extraCurricular = $request->extraCurricular;
        // $pro->extraCurricularDes = $request->extraCurricularDes;
        $pro->employment_status = $request->employment_status;
        $pro->employment_type = $request->employment_type;
        $pro->employment_permanence = $request->employment_permanence;
        $pro->employer_sector = $request->employer_sector;
        $pro->employer_name = $request->employer_name;
        $pro->occupation_category = $request->occupation_category;
        $pro->job_economic_sector = $request->job_economic_sector;
        $pro->when_found_job = $request->when_found_job;
        $pro->job_field_match = $request->job_field_match;
        $pro->use_skills = $request->use_skills;
        $pro->outside_field_due = $request->outside_field_due;
        $pro->salary_expectation = $request->salary_expectation;
        $pro->gross_salary = $request->gross_salary;
        $pro->career_growth_sat = $request->career_growth_sat;
        $pro->consider_change = $request->consider_change;
        $pro->unemp_reasons = json_encode($request->unemp_reasons);
        //check again below 
        $pro->unemp_reasons_other = $request->unemp_reasons_other;
        $pro->future_employment_type = $request->future_employment_type;
        $pro->expected_sector = $request->expected_sector;
        $pro->took_steps = $request->took_steps;
        $pro->job_search_steps = json_encode($request->job_search_steps);
        //check again below 
        $pro->job_search_steps_other = $request->job_search_steps_other;
        $pro->reservation_wage = $request->reservation_wage;
        $pro->expected_occupation = $request->expected_occupation;
        $pro->expected_job_economic_sector = $request->expected_job_economic_sector;
        $pro->job_search_duration = $request->job_search_duration;

        $pro->career_goals = json_encode($request->career_goals);
        //check again below 
        $pro->career_goals_other = $request->career_goals_other;
        $pro->university_satisfaction = $request->university_satisfaction;
        $pro->dissatisfaction_reasons = $request->dissatisfaction_reasons;
        
        $pro->teaching_methods = $request->teaching_methods;
        $pro->learning_process = $request->learning_process;
        $pro->lecturer_quality = $request->lecturer_quality;
        $pro->lab_facilities = $request->lab_facilities;
        $pro->classroom_quality = $request->classroom_quality;
        $pro->library_facilities = $request->library_facilities;
        $pro->it_facilities = $request->it_facilities;
        $pro->workload = $request->workload;
        
        $pro->last_university_exam = $request->last_university_exam;
        $pro->facilitate_employment = $request->facilitate_employment;
        $pro->other_comments = $request->other_comments;
        
//        $pro->stdName = $request->stdName;
//        $pro->regNum = $request->regNum;
//        $pro->convocationName = $request->convoName;


         session_start();
        // $pro->stdName = $_SESSION["stdName"];
        $pro->regNum = $_SESSION["user_reg"];
        $pro->convocationName = $_SESSION["convocationName"];


        try {
                $pro->save();
        }catch (QueryException $e) {
    \Log::error($e); // Log the actual exception for debugging
    return redirect()->route('eligibleStd')
        ->with('error', 'Database error: ' . $e->getMessage());
}
        try {
            $_SESSION["regPro"]->save();
        }catch (QueryException $e){
            return redirect()->route('eligibleStd')
                ->with('success',$e);
        }

        return redirect()->route('eligibleStd')
            ->with('success','Registration successfully Completed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyResponse  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyResponse $surveyresponses)
    {
        return view('survey.show',compact('surveyresponses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyResponse  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyResponse $surveyresponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyResponse  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyResponse $surveyresponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyResponse  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyResponse $surveyresponse)
    {
        $surveyresponse->delete();
        return redirect()->route('survey.index')
                    ->with('success', 'Survey response deleted.');

    }

    public static function checkSurvey ($regNumber){

        return collect(DB::select('
SELECT survey_responses.regNum FROM survey_responses;
'))->where('regNum', '=', $regNumber);

    }

    public static function checkRegistration ($regNumber){

        return collect(DB::select('
SELECT student_registrations.regNum FROM student_registrations;
'))->where('regNum', '=', $regNumber);

    }

    public static function getFacultyFromEligibleStudent ($regNumber){

        return collect(DB::select('
SELECT * FROM eligible_students;
'))->where('regNum', '=', $regNumber);

    }

    public function exportSurvey(Request $request)
    {
//        return Excel::download(new StudentRegistrationExport, 'Registered All Students.xlsx');
        return (new SurveyExport($request->input('convocationName')))->download('Survey by convocation name.xlsx');

    }

}
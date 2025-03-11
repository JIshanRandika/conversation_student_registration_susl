<?php

namespace App\Http\Controllers;

use App\Exports\SurveyExport;
use App\Models\Convocation;
use App\Models\EligibleStudent;
use App\Models\Survey;
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
        $surveys = Survey::all();
        $convo = Convocation::all()->pluck('convocation', 'id');
        return view('survey.index',compact('surveys','convo'));
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

        $pro=new Survey();
        $pro->email = $request->email;
        $pro->contactNumber = $request->contactNumber;
        $pro->gender = $request->gender;
        $pro->district = $request->district;
        $pro->zScore = $request->zScore;
        $pro->ethnicity = $request->ethnicity;
        $pro->faculty = $request->faculty;
        $pro->degreeFall = $request->degreeFall;
        $pro->degreeProgram = $request->degreeProgram;
        $pro->degreeType = $request->degreeType;
        $pro->specialization = $request->specialization;
        $pro->classReceived = $request->classReceived;
        $pro->olEnglish = $request->olEnglish;
        $pro->alEnglish = $request->alEnglish;
        $pro->engSpeakSkill = $request->engSpeakSkill;
        $pro->engListeningSkill = $request->engListeningSkill;
        $pro->engWritingSkill = $request->engWritingSkill;
        $pro->engReadingSkill = $request->engReadingSkill;
        $pro->computerLiteracy = json_encode($request->computerLiteracy);
        $pro->extraCurricular = $request->extraCurricular;
        $pro->extraCurricularDes = $request->extraCurricularDes;
        $pro->training = $request->training;
        $pro->trainingDes = $request->trainingDes;
        $pro->qualifications = $request->qualifications;
        $pro->qualificationsDes = $request->qualificationsDes;
        $pro->employment = $request->employment;
        $pro->employmentDes = $request->employmentDes;
        $pro->areaLive = $request->areaLive;
        $pro->districtLife = $request->districtLife;
        $pro->agaDivision = $request->agaDivision;
        $pro->alSchool = $request->alSchool;
        $pro->edumf = $request->edumf;
        $pro->teachingMethods = $request->teachingMethods;
        $pro->learningProcess = $request->learningProcess;
        $pro->qualityOfLec = $request->qualityOfLec;
        $pro->labFacilities = $request->labFacilities;
        $pro->qualityOfClassrooms = $request->qualityOfClassrooms;
        $pro->libraryFacilities = $request->libraryFacilities;
        $pro->itFacilities = $request->itFacilities;
        $pro->practicalKnowledge = $request->practicalKnowledge;
        $pro->textBooks = $request->textBooks;
        $pro->tutorials = $request->tutorials;
        $pro->practicalTraining = $request->practicalTraining;
        $pro->researchSkills = $request->researchSkills;
        $pro->lecNotes = $request->lecNotes;
        $pro->workload = $request->workload;
        $pro->qualityCommunication = $request->qualityCommunication;
        $pro->helpfulTeachingMaterial = $request->helpfulTeachingMaterial;
        $pro->promotionOfInteraction = $request->promotionOfInteraction;
        $pro->assignmentAndFeedback = $request->assignmentAndFeedback;
        $pro->supervisionOfProjectWork = $request->supervisionOfProjectWork;
        $pro->monitoringRoleModel = $request->monitoringRoleModel;
        $pro->monthlySalary = $request->monthlySalary;
        $pro->situationAfterUniversityEduction = json_encode($request->situationAfterUniversityEduction);
        $pro->lastExamDate = $request->lastExamDate;
        $pro->sectorsWillingEmployee = json_encode($request->sectorsWillingEmployee);
        $pro->employedAfterLastExam = $request->employedAfterLastExam;
        $pro->waitedDaysForFirstJob = $request->waitedDaysForFirstJob;
        $pro->firstAppointment = $request->firstAppointment;
        $pro->currentEmploymentStatus = $request->currentEmploymentStatus;
        $pro->typeEmployemt = $request->typeEmployemt;
        $pro->organizationCurrentlyEmployed = $request->organizationCurrentlyEmployed;
        $pro->sectorEmployed = $request->sectorEmployed;
        $pro->currentPosition = $request->currentPosition;
        $pro->jobEconomicSector = $request->jobEconomicSector;
        $pro->currentGrossMonthlySalary = $request->currentGrossMonthlySalary;
        $pro->findTheJob = $request->findTheJob;
        $pro->aspectsInGettingJob = json_encode($request->aspectsInGettingJob);
        $pro->jobRelatedDegree = $request->jobRelatedDegree;
        $pro->whenFIndCurrentJob = $request->whenFIndCurrentJob;
        $pro->satisfiedCurrentJob = $request->satisfiedCurrentJob;
        $pro->howLongWaitedToGetJob = $request->howLongWaitedToGetJob;
        $pro->lookingNowEmployee = $request->lookingNowEmployee;
        $pro->indicateReason = $request->indicateReason;
        $pro->obstaclesForJob = $request->obstaclesForJob;
        $pro->willingToFindJob = $request->willingToFindJob;
        $pro->jobRequest = $request->jobRequest;
        $pro->jobOverQualified = $request->jobOverQualified;
        $pro->careerGoalsNextTwoYears = json_encode($request->careerGoalsNextTwoYears);
        $pro->universityEducation = $request->universityEducation;
        $pro->employmentAfterGraduation = $request->employmentAfterGraduation;
//        $pro->stdName = $request->stdName;
//        $pro->regNum = $request->regNum;
//        $pro->convocationName = $request->convoName;


        session_start();
        $pro->stdName = $_SESSION["stdName"];
        $pro->regNum = $_SESSION["user_reg"];
        $pro->convocationName=$_SESSION["convocationName"];

        try {
                $pro->save();
        }catch (QueryException $e){
            return redirect()->route('eligibleStd')
                ->with('success',$e);
        }
        try {
            $_SESSION["regPro"]->save();
        }catch (QueryException $e){
            return redirect()->route('eligibleStd')
                ->with('success',$e);
        }

        return redirect()->route('eligibleStd')
            ->with('success','Registration successfully Completed.');
//            ->with('success','safda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return view('survey.show',compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $survey -> delete();

    }

    public static function checkSurvey ($regNumber){

        return collect(DB::select('
SELECT surveys.regNum FROM surveys;
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
<?php

namespace App\Http\Controllers;

use App\Mail\Confirm;
use App\Mail\SignUp;
use App\Models\Convocation;
use App\Models\EligibleStudent;
use App\Models\Faculty;
use App\Models\Report;
use App\Models\StudentRegistration;
use App\Models\User;
use App\Models\VerifiedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //
    public function sendMail(){

        $name = 'Ishan';

        Mail:: to('sajithsampath721@gmail.com')->send(new SignUp($name));



//        return view('welcome');
    }


    public function checkData(){
        session_start();

        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        $reports = Report::all();
        $faculties = Faculty::all();
        $convocations = Convocation::all();
        $student = EligibleStudent::where(
//            'regNum', strtoupper(trim($_SESSION["regNum"])))->get();
//            'regNum', strtoupper(trim(str_replace(' ', '', $_SESSION["regNum"]))))->get();
            'regNum', strtoupper(trim(str_replace(' ', '', $_SESSION["regNum"]))))->get();
        return view('checkedData',compact('student','studentRegistrations','eligibleStudents','reports','faculties','convocations'));

    }

    public function loginfilter(Request $request)
    {
//        session_start();
        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        $reports = Report::all();
        $student = EligibleStudent::where(
            'email', $_SESSION["email"])->get();

        return view('loginFilter',compact('eligibleStudents','student','reports','studentRegistrations'));

    }




    public function sendConfirmedMail(Request $request){



//        $validator = Validator::make($request->all(), [
//            'regNum' => ['required', 'string', 'max:255'],
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('verifyEmail')
//                ->withErrors($validator)
//                ->withInput();
//        }


        session_start();
        $id = 10;
        $_SESSION["user_id"] = $id;
//        $id = 14;
//        $_SESSION["user_id"] = $id;
//        $_SESSION["regNum"] = $request->regNum;
        $_SESSION["regNum"] = strtoupper(trim(str_replace(' ', '', str_replace('/', '', $request->regNum))));
//        $stdEmail = $request->email;


        $verifiedEmails = VerifiedEmail::all();

//        $users = User::all();

//        foreach ($verifiedEmails as $mail){
//            if($mail->email==$request->email){

//        if((strtoupper(trim($_SESSION["user_reg"]))==strtoupper(trim($request->regNum))){
//
//        }
        $eligibleStudents = EligibleStudent::all();
                foreach ($eligibleStudents as $std){
//                    if((strtoupper(trim($std->regNum))==strtoupper(trim($request->regNum)))&&($std->status=='Confirmed')&&(strtoupper(trim($_SESSION["user_reg"]))==strtoupper(trim($request->regNum)))){
                    if((strtoupper(trim(str_replace(' ', '', str_replace('/', '', $std->regNum))))==strtoupper(trim(str_replace(' ', '', str_replace('/', '', $request->regNum)))))&&($std->status=='Confirmed')&&(strtoupper(trim(str_replace(' ', '', str_replace('/', '', $_SESSION["user_reg"]))))==strtoupper(trim(str_replace(' ', '', str_replace('/', '', $request->regNum)))))){
                        return redirect()->route('eligibleStd')
                            ->with('success', 'You already confirmed the details');
//                        $studentRegistrations = StudentRegistration::all();
//                        $eligibleStudents = EligibleStudent::all();
//                        return view('eligibleStd',compact('eligibleStudents','studentRegistrations','stdEmail'));

                    }
//                    if((strtoupper(trim($std->regNum))==strtoupper(trim($request->regNum)))&&($std->status=='Pending')&&(strtoupper(trim($_SESSION["user_reg"]))==strtoupper(trim($request->regNum)))){
                        if((strtoupper(trim(str_replace(' ', '', str_replace('/', '', $std->regNum))))==strtoupper(trim(str_replace(' ', '', str_replace('/', '', $request->regNum)))))&&($std->status=='Pending')&&(strtoupper(trim(str_replace(' ', '', str_replace('/', '', $_SESSION["user_reg"]))))==strtoupper(trim(str_replace(' ', '', str_replace('/', '', $request->regNum)))))){
                        return redirect()->route('checkData')
                            ->with('success','Confirm your details to continue');
                    }

//                    else{
//                        return redirect()->route('checkData')
//                            ->with('success','Student add successfully.');
////                        $studentRegistrations = StudentRegistration::all();
////                        $eligibleStudents = EligibleStudent::all();
////                        $student = EligibleStudent::where(
////                            'email', $request->email)->get();
////                        return view('checkedData',compact('student','studentRegistrations','eligibleStudents'));
//                    }
                }
//                $a=2;



//            }
//        }


//        if($a===1){
//            $data=new VerifiedEmail();
//            $data->email = $request->email;
//            $data->save();

//        session_start();

//            $name = $request->email;

//        $_SESSION['sessionEmail'] = $request->email;

//            Mail:: to('jishanrandika@gmail.com')->send(new Confirm($name));



            return view('wrongRegistrationNumber');
//        }

    }
}

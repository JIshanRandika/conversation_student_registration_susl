@extends('layouts.app')


@section('content')
    <div style="margin: 50px"  class="">


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <?php
//                session_start();

                $_SESSION["regStatus"]='Not';

                ?>
            <div class="row">
                @php
                    $resultSurvey = App\Http\Controllers\SurveyController::checkSurvey(strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))));
                    $SurveyGDocuments = json_decode($resultSurvey, true);
                    $SurveyDocumentsCount = count($SurveyGDocuments);


                    $resultRegistration = App\Http\Controllers\SurveyController::checkRegistration(strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))));
                    $rGDocuments = json_decode($resultRegistration, true);
                    $rGDocumentsCount = count($rGDocuments);

                    $facultyFromEligibleStudent = App\Http\Controllers\SurveyController::getFacultyFromEligibleStudent(strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))));
                $data = json_decode($facultyFromEligibleStudent, true);
                $keys = array_keys($data);
                $key = $keys[0];
                $faculty = $data[$key]['faculty'];
                    @endphp
{{--                <div>--}}
{{--                    {{$faculty}}--}}
{{--                </div>--}}

                @if($SurveyDocumentsCount==0 && $rGDocumentsCount>0 && $faculty!="Graduate Studies")
                    <p style="color:red;font-weight: bold; font-size: 20px">Please Successfully Complete the Survey to Complete Your Registration</p>

                    <div class="col" style="margin-bottom: 10px">
                        <div class="pull-center">
                            <a class="btn btn-danger" href="{{ route('survey.create') }}">Click here to complete the Survey</a>
                        </div>
                    </div>
                @elseif($SurveyDocumentsCount>0 && $rGDocumentsCount==0 && $faculty!="Graduate Studies")
                    <p style="color:red;font-weight: bold; font-size: 20px">Survey results submitted Successful but registration not Successful, Please Retry</p>
                    <div class="col" style="margin-bottom: 10px">
                        <div class="pull-center">
                            <a class="btn btn-danger" href="{{ route('studentRegistration.create') }}">Click here to complete the Registration</a>
                        </div>
                    </div>
                @else
                    @php
                        $i = 1
                    @endphp
                    @foreach (($eligibleStudents) as $eligibleStudent)

                        {{--                    @if (strtoupper(trim($eligibleStudent->regNum)) === strtoupper(trim(Auth::user()->regNum)))--}}
                        @if (strtoupper(trim(str_replace(' ', '', str_replace('/', '', $eligibleStudent->regNum)))) === strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))
                            @php
                                $i = 2;
                                $_SESSION["convocationName"]=$eligibleStudent->convocationName;
                            @endphp

                        @endif
                    @endforeach

                    {{--            1--}}



                    @foreach ($studentRegistrations as $studentRegistration)

                        {{--                    @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim(Auth::user()->regNum)))--}}
                        @if (strtoupper(trim(str_replace(' ', '', str_replace('/', '', $studentRegistration->regNum)))) === strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))
                            @php
                                $i = 3
                            @endphp

                            {{--                    aaaaaaaaaaaaaaaaaaa--}}



                            <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                                @if($studentRegistration->status==='Pending')
                                    <div class="pull-left" style="margin-bottom: 4px">
                                        <h2 style="color: #00ffe1; font-weight: bold">Your Registration is Pending</h2>
                                        {{--                                    <a><strong>If you didn't fill the Employability Survey,</strong></a>--}}
                                        {{--                                    <a target="_blank" href="surveyView"><strong>Click Here</strong></a>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="pull-right">
                                                <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="pull-right">
                                                <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($studentRegistration->status==='Reject')
                                    <div class="pull-left">
                                        <h2 style="color: #ff5900; font-weight: bold">Your Registration is Rejected</h2>
                                        <p style="color:red;">{{$studentRegistration->statusMessage}}}</p>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="pull-right">
                                                <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="pull-right">
                                                <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($studentRegistration->status==='Accept')
                                    <div class="pull-left">
                                        <h2 style="color: #0048ff; font-weight: bold">Your are already Registered</h2>
                                    </div>

                                @endif

                            </div>
                            <div class="visible-print text-center">
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate(route('studentRegistration.show',$studentRegistration->id)); !!}
                                {{--                            <p>Scan me</p>--}}
                            </div>
                        @endif
                    @endforeach


                    @if ($i===1)
                        <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                            <div class="pull-left">
                                <h2 style="color: #ff0000; font-weight: bold">Sorry! You are Not Eligible For Convocation</h2>
                            </div>
                        </div>
                    @endif


                    @if ($i===2)

                        <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                            <div class="pull-left">
                                <h2 style="color: #00a95a; font-weight: bold">Congratulation! You are Eligible  For Convocation</h2>
                                <h6 style="color: #030000; font-weight: bold">Please do the necessary payment first and then register to the convocation</h6>
                                @foreach ($prices as $price)
                                    <h6 style="color: #030000; ">Presence - {{$price->presence}} LKR</h6>
                                    <h6 style="color: #030000; ">Absence - {{$price->absence}} LKR</h6>
                                @endforeach
                                <h6 style="color: #030000; ">Online payments and bank deposits are available</h6>
                                <h6 style="color: #030000; font-weight: bold">When registering to the system, upload the image version of the payment slip</h6>
                                {{--                            <h2 style="color: #00a95a; font-weight: bold">{{$stdEmail}}</h2>--}}
                            </div>
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="pull-right">
                                        <a class="btn btn-success" href="{{ route('studentRegistration.create') }}">Register Now</a>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="pull-right">
                                        <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
{{--                    <p style="color:red;">{{ count($result) }}</p>--}}

                @endif

{{--                <p style="color:red;">{{ $money }}</p>--}}



    </div>

@endsection



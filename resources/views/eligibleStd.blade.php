@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <?php
//                session_start();

                $_SESSION["regStatus"]='Not';

                ?>

        <div class="row justify-content-center">
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

                // Check if user has submitted Google Form survey
                $hasSurveySubmitted = App\Http\Controllers\SurveyController::checkGoogleFormSurvey(strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))));
                
                // Get survey completion details if exists
                $surveyCompletionDetails = null;
                if ($hasSurveySubmitted) {
                    $surveyResponse = \App\Models\SurveyResponse::where('regNum', strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))
                                        ->where('google_form_completed', true)
                                        ->first();
                    if ($surveyResponse) {
                        $surveyCompletionDetails = $surveyResponse;
                    }
                }
            @endphp

            @if($SurveyDocumentsCount == 0 && $rGDocumentsCount > 0 && $faculty != "Graduate Studies" && $faculty != "Indigenous Knowledge & Community Studies" && $faculty != "Agricultural Sciences" && $faculty != "Management Studies" && $faculty != "Social Sciences & Languages" && $faculty != "Medicine" && $faculty != "Applied Sciences" && $faculty != "Geomatics" && $faculty != "Technology" && $faculty != "Computing" )  
                <div class="alert alert-warning text-center fw-bold fs-5">
                    Please Successfully Complete the Survey to Complete Your Registration
                </div>
                <div class="text-center mt-3">
                    <a class="btn btn-danger btn-lg" href="{{ route('survey.create') }}">Complete the Survey</a>
                </div>
            @elseif($SurveyDocumentsCount > 0 && $rGDocumentsCount == 0 && $faculty != "Graduate Studies" && $faculty != "Indigenous Knowledge & Community Studies" && $faculty != "Agricultural Sciences" && $faculty != "Management Studies" && $faculty != "Social Sciences & Languages" && $faculty != "Medicine" && $faculty != "Applied Sciences" && $faculty != "Geomatics" && $faculty != "Technology" && $faculty != "Computing")
                <div class="alert alert-danger text-center fw-bold fs-5">
                    Survey results submitted successfully but registration not completed. Please retry.
                </div>
                <div class="text-center mt-3">
                    <a class="btn btn-danger btn-lg" href="{{ route('studentRegistration.create') }}">Complete Registration</a>
                </div>
            @else
                @php
                    $i = 1;
                @endphp
                @foreach (($eligibleStudents) as $eligibleStudent)
                    @if (strtoupper(trim(str_replace(' ', '', str_replace('/', '', $eligibleStudent->regNum)))) === strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))
                        @php
                            $i = 2;
                            $_SESSION["convocationName"] = $eligibleStudent->convocationName;
                        @endphp
                    @endif
                @endforeach

                @foreach ($studentRegistrations as $studentRegistration)
                    @if (strtoupper(trim(str_replace(' ', '', str_replace('/', '', $studentRegistration->regNum)))) === strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))))
                        @php $i = 3; @endphp
                        <div class="col-lg-12 text-center my-4">
                            @if($studentRegistration->status === 'Pending')
                            {{-- Registration deadline extended alert --}}
                            {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fas fa-clock"></i> <strong>Important Notice:</strong> Registration deadline has been extended to 20th June 2025 at 2:00 PM.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> --}}
                                <h2 class="text-info fw-bold">Your Registration is Pending</h2>
                                <div class="mt-3 d-flex justify-content-center gap-3">
                                    <a class="btn btn-primary" href="{{ route('studentRegistration.edit', $studentRegistration->id) }}">Edit Registration</a>
                                    <a class="btn btn-dark" target="_blank" href="https://www.sab.ac.lk/payment-boc/">Make Payment</a>
                                </div>
                                @if($faculty != "Graduate Studies" && $faculty != "Indigenous Knowledge & Community Studies")
                                    <div class="mt-4 text-center">
                                        @if($hasSurveySubmitted)
                                            <div class="alert alert-success">
                                                <p class="text-success fw-bold mb-2">
                                                    You have successfully completed the survey!
                                                </p>
                                                @if($surveyCompletionDetails && $surveyCompletionDetails->google_form_completed_at)
                                                    <small class="text-muted">
                                                        Completed on: {{ \Carbon\Carbon::parse($surveyCompletionDetails->google_form_completed_at)->format('M d, Y \a\t h:i A') }}
                                                    </small>
                                                @endif
                                            </div>
                                        @else
                                            <p class="text-danger fw-bold mb-3">
                                                Please complete the survey.
                                            </p>
                                            <a class="btn btn-success" href="{{ route('submitGoogleSurvey') }}">
                                                Submit Survey
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            @endif
                            @if($studentRegistration->status === 'Reject')
                            {{-- Registration deadline extended alert --}}
                            {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fas fa-clock"></i> <strong>Important Notice:</strong> Registration deadline has been extended to 20th June 2025 at 2:00 PM.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> --}}
                                <h2 class="text-danger fw-bold">Your Registration is Rejected</h2>
                                <p class="text-danger">{{ $studentRegistration->statusMessage }}</p>
                                <div class="mt-3 d-flex justify-content-center gap-3">
                                    <a class="btn btn-primary" href="{{ route('studentRegistration.edit', $studentRegistration->id) }}">Edit Registration</a>
                                    <a class="btn btn-dark" target="_blank" href="https://www.sab.ac.lk/payment-boc/">Make Payment</a>
                                </div>
                            @endif
                            @if($studentRegistration->status === 'Accept')
                                <h2 class="text-success fw-bold">You are already Registered</h2>
                                @if($faculty != "Graduate Studies" && $faculty != "Indigenous Knowledge & Community Studies")
                                    <div class="mt-4 text-center">
                                        @if($hasSurveySubmitted)
                                            <div class="alert alert-success">
                                                <p class="text-success fw-bold mb-2">
                                                    You have successfully completed the survey!
                                                </p>
                                                @if($surveyCompletionDetails && $surveyCompletionDetails->google_form_completed_at)
                                                    <small class="text-muted">
                                                        Completed on: {{ \Carbon\Carbon::parse($surveyCompletionDetails->google_form_completed_at)->format('M d, Y \a\t h:i A') }}
                                                    </small>
                                                @endif
                                            </div>
                                        @else
                                            <p class="text-danger fw-bold mb-3">
                                                Please complete the survey.<br>
                                                If already filled, you may ignore this message.
                                            </p>
                                            <a class="btn btn-success" href="{{ route('submitGoogleSurvey') }}">
                                                Submit Survey
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="text-center">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate(route('studentRegistration.show', $studentRegistration->id)) !!}
                        </div>
                    @endif
                @endforeach

                @if ($i === 1)
                    <div class="col-lg-12 text-center my-4">
                        <h2 class="text-danger fw-bold">Sorry! You are Not Eligible for Convocation</h2>
                    </div>
                @endif
                @if ($i === 2)
                    <div class="col-lg-12 text-center my-4">
                        {{-- Maintenance over alert --}}
        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <strong>System Update:</strong> Maintenance has been completed successfully. All registration services are now available.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        {{-- Registration deadline extended alert --}}
                            {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fas fa-clock"></i> <strong>Important Notice:</strong> Registration deadline has been extended to 20th June 2025 at 2:00 PM.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> --}}
                        <h2 class="text-success fw-bold">Congratulations! You are Eligible for Convocation</h2>
                        <p class="fw-bold">Please complete your payment first and then proceed with the registration.</p>
                        @foreach ($prices as $price)
                            <p class="text-dark">Presence - {{ $price->presence }} LKR</p>
                            <p class="text-dark">Absence - {{ $price->absence }} LKR</p>
                        @endforeach
                        <p class="text-dark">Online payments and bank deposits are available.</p>
                        <p class="fw-bold">Upload a scanned image of your payment slip during registration.</p>
                        <div class="mt-3 d-flex justify-content-center gap-3">
                            <a class="btn btn-success btn-lg" href="{{ route('studentRegistration.create') }}">Register Now</a>
                            <a class="btn btn-dark btn-lg" target="_blank" href="https://www.sab.ac.lk/payment-boc/">Make Payment</a>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection

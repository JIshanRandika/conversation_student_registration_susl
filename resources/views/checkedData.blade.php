@extends('layouts.app')

@section('content')

    <div style="margin: 60px" class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @php
            $i = 1
        @endphp

        @foreach ($student as $std)

                @foreach($convocations as $convocation)
                    @if(($convocation->convocation==$std->convocationName)&&($convocation->status=="Closed"))
                        <h2 style="color: #ff0000; font-weight: bold">{{$std->convocationName}} convocation not available</h2>
                    @endif
                    @if(($convocation->convocation==$std->convocationName)&&($convocation->status=="Open"))
                        @foreach($faculties as $faculty)
                            @if(($faculty->faculty==$std->faculty)&&($faculty->status=="Closed"))
                                <h2 style="color: #ff0000; font-weight: bold">Registration Closed in Faculty of {{$std->faculty}}</h2>
                            @endif
                            @if(($faculty->faculty==$std->faculty)&&($faculty->status=="Open"))

                                @php
                                    $i++
                                @endphp
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="pull-right" style="margin-bottom: 50px">
                                        <a class="btn btn-primary" href="{{ url('/verifyEmail') }}"> Back</a>
                                    </div>
                                    <div>

                                        @php
                                            $q = 1
                                        @endphp

                                        @foreach ($reports as $report)
                                            @if ($report->email==Auth::user()->email)
                                                @php
                                                    $q = 2
                                                @endphp
                                                @if ($report->reportStatus=='Fixed')
                                                    @php
                                                        $q =3
                                                    @endphp
                                                @endif
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Report Status:</strong>
                                                        {{$report->reportStatus}}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Report Description:</strong>
                                                        {{$report->description}}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Status:</strong>
                                                {{$std->status}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name With Initials:</strong>
                                                {{$std->nameWithInitials}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Gender:</strong>
                                                {{$std->gender}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Degree Name:</strong>
                                                {{$std->degreeName}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Registration Number:</strong>
                                                {{$std->regNum}}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Index Number:</strong>
                                                {{$std->indexNum}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Degree class:</strong>
                                                {{$std->degreeClass}}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Faculty:</strong>
                                                {{$std->faculty}}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Department:</strong>
                                                {{$std->department}}
                                            </div>
                                        </div>

                                        @if ($std->status=='Pending')
                                            @if ($q==1 || $q==3)
                                                <form id="confirmForm" action="{{ route('eligibleStudents.update',$std->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-xs-6 col-sm-6 col-md-6" style="margin-bottom: 10px">
                                                        <button type="button" id="confirmButton" class="btn btn-primary">Confirm the above data</button>
                                                    </div>
                                                </form>
                                            @endif

                                            @if ($q==1)
                                                <div class="col-xs-2 col-sm-2 col-md-2">
                                                    <div class="pull-right">
                                                        <a class="btn btn-danger" href="{{ route('report.create') }}">Report</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('confirmButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to confirm the above data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('confirmForm').submit();
                }
            });
        });
    </script>
@endsection

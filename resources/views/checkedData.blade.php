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
            @php
                $i++
            @endphp
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div>

                @php
                    $q = 1
                @endphp

                @foreach ($reports as $report)
                    @if ($report->email==$std->email)
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


{{--                @if ($q==2)--}}
{{--                    <div class="col-xs-2 col-sm-2 col-md-2">--}}
{{--                        <div class="pull-right">--}}
{{--                            <a class="btn btn-danger"  href="{{ route('report.create') }}">Report Edit</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Degree Name:</strong>
                        {{$std->degreeName}}
                    </div>
                </div>






{{--                {{$std->id}}--}}
                @if ($std->status=='Pending')

{{--                    <div class="col-xs-2 col-sm-2 col-md-2">--}}
{{--                        <div class="pull-right">--}}
{{--                            <a class="btn btn-dark" target="_blank" href="{{ route('sendConfirmedMail',[$std->id]) }}">Confirmed</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    @if ($q==1 || $q==3)
                    <form action="{{ route('eligibleStudents.update',$std->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Confirm the above data</button>
                        </div>


                    </form>
                    @endif

                    @if ($q==1)
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="pull-right">
                                <a class="btn btn-danger"  href="{{ route('report.create') }}">Report</a>
                            </div>
                        </div>
                    @endif



                @endif


            </div>
        </div>
        @endforeach
        @if ($i==1)
            <div>You are Not Eligible</div>
        @endif

    </div>




{{--        @if ($student->email)--}}

{{--            {{$student->email}}--}}
{{--        @endif--}}

{{--            <img src="/images/img.jpeg">--}}

{{--                </div>--}}
{{--        </div>--}}
@endsection

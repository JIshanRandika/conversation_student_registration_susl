@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Reported by  {{ $report->email }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('report.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin: 50px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $report->reportStatus }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $report->description }}
            </div>
        </div>
        @foreach ($eligibleStudents as $eligibleStudent)
            @if($eligibleStudent->email==$report->email)
                <div class="col-xs-12 col-sm-12 col-md-12">
                <a class="btn btn-success" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit Details</a>
                </div>
            @endif
        @endforeach

        @if(checkPermission(['examinationBranch','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))

            <form action="{{ route('report.update',$report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div style="margin: 60px" class="row">


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Review Status:</strong>
                            <div>
                                <select name="reportStatus" class="form-control" id="frm_duration">
                                    <option selected>{{ $report->reportStatus }}</option>
                                    <option value="Reported">Reported</option>
                                    <option value="Fixed">Fixed</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Reviewed</button>
                    </div>
                </div>

            </form>
        @endif
    </div>
@endsection

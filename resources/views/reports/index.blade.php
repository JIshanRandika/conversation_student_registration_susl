



@extends('layouts.app')


@section('content')

    <div style="margin: 50px"  class="">
        <div class="row" style="margin: 50px">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
                </div>
            </div>
        </div>


        <script>

            $(function() {

                // run on change for the selectbox
                $( "#frm_duration" ).change(function() {
                    updateDurationDivs();
                });

                // handle the updating of the duration divs
                function updateDurationDivs() {
                    // hide all form-duration-divs
                    $('.form-duration-div').hide();

                    var divKey = $( "#frm_duration option:selected" ).val();
                    $('#divFrm'+divKey).show();
                }

                // run at load, for the currently selected div to show up
                updateDurationDivs();

            });
        </script>

        <div class="form-group" style="margin-top: 20px">
            <div>
                <select required name="attendance" class="form-control" id="frm_duration">
                    {{--                            <option selected>Choose</option>--}}
{{--                    <option selected value="All">All Eligible Students</option>--}}
                    <option selected value="Reported">New Reports</option>
                    <option value="Fixed">Fixed Reports</option>
                </select>
            </div>
        </div>



        <table style="display:none" id="divFrmReported"  class="table table-bordered form-duration-div">
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Faculty</th>
                <th>Report Status</th>
                <th>Action</th>

            </tr>


            @php
                $a = 0
            @endphp
            @foreach ($reports as $report)
                <tr>
                    @if ($report->reportStatus == 'Reported')
                        @if(checkPermission(['Admin']))
                            <td>{{ ++$a }}</td>
                            @include('component.reportTableComponent')
                        @endif
                            @if(checkPermission(['EBSC_Applied']))
                                @if($report->faculty == 'Applied Sciences')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Geo']))
                                @if($report->faculty == 'Geomatics')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Social']))
                                @if($report->faculty == 'Social Sciences & Languages')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Mana']))
                                @if($report->faculty == 'Management Studies')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Med']))
                                @if($report->faculty == 'Medicine')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Agri']))
                                @if($report->faculty == 'Agricultural Sciences')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Tech']))
                                @if($report->faculty == 'Technology')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_GS']))
                                @if($report->faculty == 'Graduate Studies')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_Computing']))
                                @if($report->faculty == 'Computing')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                            @if(checkPermission(['EBSC_CIKCS']))
                                @if($report->faculty == 'Indigenous Knowledge & Community Studies')
                                    <td>{{ ++$a }}</td>
                                    @include('component.reportTableComponent')
                                @endif
                            @endif
                    @endif

                </tr>
            @endforeach


        </table>


        <table style="display:none" id="divFrmFixed"  class="table table-bordered form-duration-div">
            <tr>
                <th>No</th>
                <th>Registration Number</th>
                <th>Email</th>
                <th>Faculty</th>
                <th>Report Status</th>
                <th>Action</th>

            </tr>


            @php
                $a = 0
            @endphp
            @foreach ($reports as $report)
                <tr>
                    @if ($report->reportStatus == 'Fixed')
                        @if(checkPermission(['Admin']))
                            <td>{{ ++$a }}</td>
                            @include('component.reportTableComponent')
                        @endif
                        @if(checkPermission(['EBSC_Applied']))
                            @if($report->faculty == 'Applied Sciences')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Geo']))
                            @if($report->faculty == 'Geomatics')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Social']))
                            @if($report->faculty == 'Social Sciences & Languages')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Mana']))
                            @if($report->faculty == 'Management Studies')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Med']))
                            @if($report->faculty == 'Medicine')
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Agri']))
                            @if($report->faculty == 'Agricultural Sciences')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Tech']))
                            @if($report->faculty == 'Technology')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_GS']))
                            @if($report->faculty == 'Graduate Studies')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_Computing']))
                            @if($report->faculty == 'Computing')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif
                        @if(checkPermission(['EBSC_CIKCS']))
                            @if($report->faculty == 'Indigenous Knowledge & Community Studies')
                                    <td>{{ ++$a }}</td>
                                @include('component.reportTableComponent')
                            @endif
                        @endif

                    @endif
                </tr>
            @endforeach


        </table>

    </div>








@endsection

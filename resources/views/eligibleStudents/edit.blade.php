@extends('layouts.app')

@section('content')
    <?php
    session_start();
//    echo $_SESSION["user_id"]
    //    $_SESSION["user_id"] = $id;

    ?>
    <div style="margin: 50px">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Student</h2>
                </div>
                <div class="pull-right">
                    @if($_SESSION["user_id"]!=0)
                        <a class="btn btn-primary" href="{{ route('report.show',$_SESSION["user_id"]) }}"> Back</a>
{{--                                            <a class="btn btn-primary" href="javascript:history.back()"> Back</a>--}}
                    @endif
                        @if($_SESSION["user_id"]==0)
                            <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
                            {{--                                            <a class="btn btn-primary" href="javascript:history.back()"> Back</a>--}}
                        @endif
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

        <form action="{{ route('eligibleStudents.update',$eligibleStudent->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name with Initials:</strong>
                        <input required value="{{ $eligibleStudent->nameWithInitials }}" type="text" name="nameWithInitials" class="form-control" placeholder="Name with Initials">
                    </div>
                </div>

{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>Full name in English block letters:</strong>--}}
{{--                        <input required value="{{ $eligibleStudent->fullNameInEnglishBlock }}" type="text" name="fullNameInEnglishBlock" class="form-control" placeholder="Full name in English block letters">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>Full name in Sinhala:</strong>--}}
{{--                        <input required value="{{ $eligibleStudent->fullNameInSinhala }}" type="text" name="fullNameInSinhala" class="form-control" placeholder="Full name in Sinhala">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        <select required name="gender" class="custom-select" id="inputGroupSelect01" >
                            <option selected>{{ $eligibleStudent->gender }}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                    </div>
                </div>

{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>Email:</strong>--}}
{{--                        <input required value="{{ $eligibleStudent->email }}" type="text" name="email" class="form-control" placeholder="Email">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name of the degree to be conferred:</strong>
                        <input required value="{{ $eligibleStudent->degreeName }}" type="text" name="degreeName" class="form-control" placeholder="Name of the degree to be conferred">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Registration Number:</strong>
                        <input required value="{{ $eligibleStudent->regNum }}" type="text" name="regNum" class="form-control" placeholder="Registration Number">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Index Number:</strong>
                        <input required value="{{ $eligibleStudent->indexNum }}" type="text" name="indexNum" class="form-control" placeholder="Index Number">
                    </div>
                </div>


                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker2').datepicker({
                            format: "mm/yyyy",
                            viewMode: "months",
                            minViewMode: "months",
                            weekStart: 0,
                            calendarWeeks: true,
                            autoclose: true,
                            todayHighlight: true,
                            orientation: "auto",

                        });
                    });
                </script>


{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>Month and Year of the Degree Examination: </strong>--}}


{{--                                                <div class='input-group date' id='datetimepicker2'>--}}
{{--                                                    <input required value="{{ $eligibleStudent->monthAndYearExamination }}" placeholder="MM/YYYY" required name="monthAndYearExamination" type='text' class="form-control" />--}}
{{--                                                    <span class="input-group-addon">--}}
{{--                                                    <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mark the relevant one:</strong>
                        <div class="row">
                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                <strong style="margin-right:10px">1st Class:</strong>
                                <input {{ ($eligibleStudent->degreeClass == "1st Class") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="1st Class" >
                            </div>
                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                <strong style="margin-right:10px">2nd Upper:</strong>
                                <input {{ ($eligibleStudent->degreeClass == "2nd Upper") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="2nd Upper" >
                            </div>
                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                <strong style="margin-right:10px">2nd Lower:</strong>
                                <input {{ ($eligibleStudent->degreeClass == "2nd Lower") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="2nd Lower" >
                            </div>
                            <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                <strong style="margin-right:10px">Ordinary Pass:</strong>
                                <input {{ ($eligibleStudent->degreeClass == "Ordinary Pass") ? 'checked' : ''}} style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="Ordinary Pass" >
                            </div>

                        </div>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Faculty:</strong>

                        <select name="faculty" class="custom-select" id="inputGroupSelect01" >
                            <option selected>{{ $eligibleStudent->faculty }}</option>
                            {{--                                                <option value="Graduate Studies">Graduate Studies</option>--}}
                            <option value="Computing">Computing</option>
                            <option value="Agricultural Sciences">Agricultural Sciences</option>
                            <option value="Applied Sciences">Applied Sciences</option>
                            <option value="Geomatics">Geomatics</option>
                            <option value="Management Studies">Management Studies</option>
                            <option value="Medicine">Medicine</option>
                            <option value="Social Sciences & Languages">Social Sciences & Languages</option>
                            <option value="Technology">Technology</option>
                            <option value="Sport">Sport</option>
                            <option value="Graduate Studies">Graduate Studies</option>
                            <option value="Indigenous Knowledge & Community Studies">Indigenous Knowledge & Community Studies</option>

                        </select>
                    </div>
                </div>

                <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Department:</strong>
                        <input required value="{{ $eligibleStudent->department }}" type="text" name="department" class="form-control"
                               placeholder="Department">
                    </div>
                </div>

                <div class="form-group">
                    <strong>Convocation:--</strong>


                    <select id="convocationName" name="convocationName" class="form-control">
                        @foreach ($convo as $key => $value)
                            <option value="{{ $key }}"  @if($eligibleStudent->convocationName==$value) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>


                </div>
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>Degree Name:</strong>--}}
{{--                        <input value="{{ $eligibleStudent->degreeName }}" required type="text" name="degreeName" class="form-control"--}}
{{--                               placeholder="Degree Name">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>

@endsection

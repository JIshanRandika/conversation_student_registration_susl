@extends('layouts.app')

@section('content')



    <div class="">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div style="margin: 20px" class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add a new student</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
                </div>
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

    <form action="{{ route('eligibleStudents.store') }}" id="selectform" method="POST">
        @csrf
        <div style="margin: 20px" class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name with Initials:</strong>
                    <input required type="text" name="nameWithInitials" class="form-control" placeholder="Name with Initials">
                </div>
            </div>

{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Full name in English block letters:</strong>--}}
{{--                    <input required type="text" name="fullNameInEnglishBlock" class="form-control" placeholder="Full name in English block letters">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Full name in Sinhala:</strong>--}}
{{--                    <input required type="text" name="fullNameInSinhala" class="form-control" placeholder="Full name in Sinhala">--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <select required name="gender" class="custom-select" id="inputGroupSelect01" >
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Email:</strong>--}}
{{--                    <input required type="text" name="email" class="form-control" placeholder="Email">--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name of the degree to be conferred:</strong>
                    <input required type="text" name="degreeName" class="form-control"
                           placeholder="Degree Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Registration Number:</strong>
                    <input required type="text" name="regNum" class="form-control" placeholder="Registration Number">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Index Number:</strong>
                    <input required type="text" name="indexNum" class="form-control" placeholder="Index Number">
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
            <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>


{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Month and Year of the Degree Examination: </strong>--}}
{{--                    <div class='input-group date' id='datetimepicker2'>--}}
{{--                        <input placeholder="MM/YYYY" required name="monthAndYearExamination" type='text' class="form-control" />--}}
{{--                        <span class="input-group-addon">--}}
{{--                                                <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                                            </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mark the relevant cage:</strong>
{{--                    <input readonly value="{{ $eligibleStudent->degreeClass }}" required type="text" name="degreeClass" class="form-control" placeholder="Degree Class">--}}

                                                <div class="row">
                                                    <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                                        <strong style="margin-right:10px">1st Class:</strong>
                                                        <input style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="1st Class" >
                                                    </div>
                                                    <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                                        <strong style="margin-right:10px">2nd Upper:</strong>
                                                        <input style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="2nd Upper" >
                                                    </div>
                                                    <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                                        <strong style="margin-right:10px">2nd Lower:</strong>
                                                        <input style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="2nd Lower" >
                                                    </div>
                                                    <div style="display: inline-flex; justify-content: center; margin-top: 5px;" class="col-xs-12 col-sm-12 col-md-3">
                                                        <strong style="margin-right:10px">Ordinary Pass:</strong>
                                                        <input style="margin-top: 5px" type="radio" class="flat" name="degreeClass" value="Ordinary Pass" >
                                                    </div>

                                                </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Faculty:</strong>

                    <select required name="faculty" class="custom-select" id="inputGroupSelect01" >
                        <option selected>Choose...</option>
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


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Department:</strong>
                    <input value="Never" type="text" name="department" class="form-control"
                           placeholder="Department">
                </div>
            </div>
            <div class="form-group">
                <strong>Convocation:</strong>
                {{ Form::select('convocationName', $convo, null, ['class' => 'form-control']) }}
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>




        </div>

    </form>
    <div style="margin-bottom:50px;margin-top: -30px" class="row">
        <div class="col-xs-11 col-sm-11 col-md-11 text-center">
        </div>
        <div  class="col-xs-1 col-sm-1 col-md-1">
            <button class="btn btn-dark" onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;">
                Reset
            </button>
        </div>
    </div>
@endsection

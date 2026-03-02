@extends('layouts.app')

@section('content')



    <div style="display: inline-flex; justify-content: center; width: 100%;" >


    <form  action="{{ route('sendConfirmedMail') }}" method="POST">
        @csrf
        {{--    @method('PUT')--}}

        <div style="margin: 60px" class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <?php
                    session_start();
                    //            $id = 10;
                    //            $_SESSION["user_id"] = $id;
                    //
                    //                           session_start();
                    //            echo $_SESSION["user_id"];
                    //            echo $_SESSION["email"];
                    $_SESSION["user_reg"]=strtoupper(trim(Auth::user()->regNum));
                    $_SESSION["stdName"]=strtoupper(trim(Auth::user()->name));
//                    echo $_SESSION["user_reg"];

                    //            session_destroy();
                    ?>
                    
                    @if(checkPermission(['Admin', 'EBSC_Applied', 'EBSC_Geo', 'EBSC_Social', 'EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS','EBSC_Computing','EBSC_CIKCS']))

                    
                        <div class="nav justify-content-center">
                            <a class="btn btn-lg btn-primary mx-auto" href="{{ route('eligibleStudents.index') }}">Dashboard</a>
                        </div>
                        @else
                        <strong>Registration Number:</strong>
                        {{--                    <input required type="text" name="email" class="form-control" placeholder="Email">--}}
                                            <input id="regNum" type="text" class="form-control @error('regNum') is-invalid @enderror" name="regNum" value="{{ old('regNum') }}" required autocomplete="regNum" autofocus placeholder="Registration Number">
                        {{--                    <input id="regNum" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Registration Number">--}}
                                            @error('email')
                        
                    

                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button style="width: 10%" type="submit" class="btn btn-primary">Go</button>
            </div>
            @endif

            <div class="" style="margin-top: 20px">
                <div class="wecomebox" style="background: #800f0f">
                    <h1 style="font-weight: bold">Welcome To</h1>
                    <h2>Convocation Student Registration System</h2>
                    <h5>Sabaragamuwa University of Sri Lanka</h5>
                    {{--<!--                            --><?php--}}
                    {{--                            session_start();--}}
                    {{--                            $id = 10;--}}
                    {{--                            $_SESSION["user_id"] = $id;--}}
                    {{--                            echo $_SESSION["user_id"];--}}
                    {{--                            ?>--}}
                    {{--                            <h5>{{$_SESSION['sessionEmail']}}</h5>--}}
                </div>
            </div>
        </div>

    </form>

    </div>


@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="margin: 50px"  class="">
            <div class="row" style="margin: 50px">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 m-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    @if(checkPermission(['Admin']))
                <div class="card">
                    <div class="card-header">{{ __('New users') }}</div>

                    <div class="card-body">


                        <form action="{{ route('user.store') }}" id="selectform" method="POST">
                            @csrf
                            <div style="margin: 20px" class="row">
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                    <input required type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                    <div class="col-md-6">
                                        <input required type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                    <div class="col-md-6">
                                        <select required name="is_permission" class="form-control" id="frm_duration">
                                            <option selected value=1>Admin</option>
                                            <option selected value=11>EBSC_Applied</option>
                                            <option selected value=12>EBSC_Geo</option>
                                            <option selected value=13>EBSC_Social</option>
                                            <option selected value=14>EBSC_Mana</option>
                                            <option selected value=15>EBSC_Med</option>
                                            <option selected value=16>EBSC_Agri</option>
                                            <option selected value=17>EBSC_Tech</option>
                                            <option selected value=16>EBSC_Agri</option>
                                            <option selected value=18>EBSC_GS</option>
                                            <option selected value=19>EBSC_Computing</option>
                                            <option selected value=20>EBSC_Sport</option>
                                            <option selected value=21>EBSC_CIKCS</option>
                                            <option selected value=2>Main Store Clark</option>
                                            <option selected value=3>Vice Chancellor</option>
                                            <option selected value=4>Survey Access</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input required type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>




                            </div>

                        </form>

                    </div>
                </div>
                    @endif
            </div>
        </div>
    </div>
@endsection

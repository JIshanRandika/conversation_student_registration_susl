@extends('layouts.app')


@section('content')
    @if(checkPermission([ 'Admin' ]))
    <div style="margin: 50px"  class="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
{{--            <div class="row" style="margin-bottom: 10px">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="pull-right">--}}
{{--                        <a target="_blank" class="btn btn-dark" href="{{ route('faculty.create') }}">Add a new faculty</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        <table class="table table-bordered form-duration-div">
            <tr>

                @if(checkPermission(['Admin']))
                    <th>No</th>
                    <th>Faculty</th>
                    <th>Status</th>
                    <th >Action</th>
                @endif

            </tr>
            @php
                $a = 0
            @endphp
            @foreach ($faculties as $faculty)
                <tr>

                    @if(checkPermission(['Admin']))
                        <td>{{ ++$a }}</td>
                        <td>{{ $faculty->faculty }}</td>



                        <form action="{{ route('faculty.update',$faculty->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <td>

                                <select required name="status" class="custom-select" id="inputGroupSelect01" >
                                    <option selected>{{ $faculty->status }}</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>

                                </select>
                            </td>


                            <td>
                                <button type="submit" class="btn btn-danger">Update</button>
                            </td>
                        </form>
                    @endif



                </tr>
            @endforeach
        </table>

    </div>



@endif
@endsection

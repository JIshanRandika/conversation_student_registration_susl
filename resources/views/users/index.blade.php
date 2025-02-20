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
    </div>
    @if(checkPermission(['Admin']))

        <div style="margin: 50px">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-right">
                        <a target="_blank" class="btn btn-dark" href="{{ route('user.create') }}">New User</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered form-duration-div">
                <tr>
                    <th>Reg.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach ($users as $user)
                    <tr>

                        <td>{{$user->name}}</td>
                        <form action="{{ route('user.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <input value="{{$user->regNum}}"  name="email" class="form-control" />
                            </td>
                            <td>
                                <input value="{{$user->email}}"  name="email" class="form-control" />
                            </td>

                            <td>
                                <button type="submit" class="btn btn-danger">Update</button>
                            </td>
                        </form>
{{--                        <td>{{$user->email}}</td>--}}
                        <td>


                            <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="POST">
                                 @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    @endif


@endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>

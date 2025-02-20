@extends('layouts.app')

@section('content')
    @if(checkPermission([ 'Admin' ]))
    <div style="margin: 50px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered form-duration-div">
            <tr>
                @if(checkPermission(['Admin']))
                    <th>No</th>
                    <th>Faculty</th>
                    <th>Status</th>
                    <th>Action</th>
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

                        <form id="update-form-{{ $faculty->id }}" action="{{ route('faculty.update', $faculty->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <select required name="status" class="custom-select">
                                    <option selected>{{ $faculty->status }}</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="confirmUpdate({{ $faculty->id }})">Update</button>
                            </td>
                        </form>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmUpdate(facultyId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to update the status!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-form-' + facultyId).submit();
                }
            });
        }
    </script>
@endsection

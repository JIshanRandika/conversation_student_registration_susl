@extends('layouts.app')

@section('content')
    @if(checkPermission(['Admin']))
        <div style="margin: 50px">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-right">
                        <a target="_blank" class="btn btn-dark" href="{{ route('convocation.create') }}">Add a new Convocation</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered form-duration-div">
                <tr>
                    @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS','EBSC_Computing']))
                        <th>No</th>
                        <th>Convocation</th>
                        <th>Status</th>
                        <th>Action</th>
                    @endif
                </tr>
                @php
                    $a = 0
                @endphp
                @foreach ($convocations as $convocation)
                    <tr>
                        @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS','EBSC_Computing']))
                            <td>{{ ++$a }}</td>

                            <form id="updateForm{{ $convocation->id }}" action="{{ route('convocation.update', $convocation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <input value="{{ $convocation->convocation }}" name="convocation" class="form-control" />
                                </td>
                                <td>
                                    <select required name="status" class="custom-select" id="inputGroupSelect01">
                                        <option selected>{{ $convocation->status }}</option>
                                        <option value="Open">Open</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="confirmUpdate({{ $convocation->id }})">Update</button>
                                </td>
                            </form>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    {{-- Include SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmUpdate(convocationId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to update this convocation record.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "No, cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm' + convocationId).submit();
                }
            });
        }
    </script>
@endsection

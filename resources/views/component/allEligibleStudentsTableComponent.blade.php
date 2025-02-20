<td>
    @if($allEligibleStudent->status == 'Pending')
        <a class="btn btn-warning text-dark fw-bold">Registration {{$allEligibleStudent->status}}</a>
    @elseif($allEligibleStudent->status == 'Reject')
        <a class="btn btn-danger fw-bold">Registration {{$allEligibleStudent->status}}</a>
    @elseif($allEligibleStudent->status == 'Accept')
        <a class="btn btn-success fw-bold">Registration {{$allEligibleStudent->status}}</a>
    @else
        <a class="btn btn-secondary fw-bold">Not Registered</a>
    @endif
</td>
<td>{{ $allEligibleStudent->nameWithInitials }}</td>
<td>{{ $allEligibleStudent->regNum }}</td>
<td>{{ $allEligibleStudent->indexNum }}</td>
<td>{{ $allEligibleStudent->faculty }}</td>
<td>{{ $allEligibleStudent->department }}</td>
<td>{{ $allEligibleStudent->degreeName }}</td>

<td>
    @if($allEligibleStudent->id)
        @if($allEligibleStudent->sid)
            @if($allEligibleStudent->svid)
                <form method="GET" action="{{route('registerdwithsurveyreset')}}" class="d-inline">
                    @csrf
                    <input type="hidden" name="eid" value="{{$allEligibleStudent->id}}">
                    <input type="hidden" name="sid" value="{{$allEligibleStudent->sid}}">
                    <input type="hidden" name="svid" value="{{$allEligibleStudent->svid}}">
                    <button type="submit" class="btn btn-outline-warning">Reset</button>
                </form>
            @else
                <form method="GET" action="{{route('registerdreset')}}" class="d-inline">
                    @csrf
                    <input type="hidden" name="eid" value="{{$allEligibleStudent->id}}">
                    <input type="hidden" name="sid" value="{{$allEligibleStudent->sid}}">
                    <button type="submit" class="btn btn-outline-warning">Reset</button>
                </form>
            @endif
        @else
            <form method="GET" action="{{route('eligiblestudentreset')}}" class="d-inline">
                @csrf
                <input type="hidden" name="eid" value="{{$allEligibleStudent->id}}">
                <button type="submit" class="btn btn-outline-warning">Reset</button>
            </form>
        @endif
    @endif

    @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS','surveyAccess','EBSC_Computing']))
        <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$allEligibleStudent->id) }}">Edit</a>

        <form id="delete-form-{{ $allEligibleStudent->id }}" action="{{ route('eligibleStudents.destroy',$allEligibleStudent->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $allEligibleStudent->id }})">Delete</button>
        </form>

        @if(in_array($allEligibleStudent->status, ['Pending', 'Reject', 'Accept']))
            <a class="btn btn-info" href="{{ route('studentRegistration.show',$allEligibleStudent->sid) }}">Registration {{$allEligibleStudent->status}}</a>
            @if($allEligibleStudent->svid)
                <a class="btn btn-info" href="{{ route('survey.show',$allEligibleStudent->svid) }}">Survey</a>
            @endif
        @endif
    @endif
</td>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
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
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

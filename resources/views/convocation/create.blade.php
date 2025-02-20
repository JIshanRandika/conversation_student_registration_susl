@extends('layouts.app')

@section('content')
<div class="container mt-4">

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">New Convocation</h2>
        <a class="btn btn-primary" href="{{ route('convocation.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4 " style="background-color: #E9DDDD">
        <form action="{{ route('convocation.store') }}" id="selectform" method="POST">
            @csrf
            <div class="mb-3">
                <label for="convocation" class="form-label fw-semibold">Convocation Name</label>
                <input required type="text" name="convocation" class="form-control" id="convocation" placeholder="Enter Convocation Name">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label fw-semibold">Availability Status</label>
                <select required name="status" class="form-select" id="status">
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>

            <div class="d-flex justify-content-end gap-3">
                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('selectform').reset();">Reset</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>No Eligible Students Added Yet</h2>
    <p>Please add eligible students to proceed.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Go to Dashboard</a>
</div>
@endsection

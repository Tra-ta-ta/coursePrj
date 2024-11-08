@extends('loyauts.formsite')
@section('content')
    <div class="container mt-5">
        <!-- Top Bar -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="circle-icon"></span>
            <button class="btn btn-outline-primary">Logout</button>
        </div>

        <!-- Options Section -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <button class="btn btn-primary">Option 1</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <button class="btn btn-primary">Option 2</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <button class="btn btn-primary">Option 3</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="border mt-4 p-4">
            <!-- Main content goes here -->
        </div>

        <!-- Bottom Navigation -->
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-secondary">Back</button>
            <button class="btn btn-secondary">Next</button>
            <button class="btn btn-secondary">Home</button>
        </div>
    </div>
@endsection('content')

@extends('ui_master.dashboard')
@section('content')

<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        {{-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard sale</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Dashboard sale</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->


        <div class="card">
            <div class="card-header">
                <h5>Add User</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.user') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name</label><span class="text-danger">*</span></h5>
                        <input type="text" name="fullName" class="form-control" placeholder="Enter user's full name">
                        @error('fullName')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label><span class="text-danger">*</span></h5>
                        <input type="email" name="emailAddress" class="form-control" placeholder="Enter user's email address">
                        @error('emailAddress')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number</label><span class="text-danger">*</span></h5>
                        <input type="text" name="phoneNumber" class="form-control" placeholder="Enter user's phone number">
                        @error('phoneNumber')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Role</label><span class="text-danger">*</span></h5>
                        <select class="form-control" name="role" id="role">
                            <option value="" selected="" disabled="">Select User's Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                        @error('role')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection
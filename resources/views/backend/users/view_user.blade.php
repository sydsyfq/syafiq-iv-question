@extends('ui_master.dashboard')
@section('content')

<div class="pc-container">
	<div class="pcoded-content">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h3 class="d-inline-block">User List</h3>
                    <a href="{{ route('add.user') }}" style="float: right;" class="btn btn-success" href>Add User</a>
				</div>
				<div class="card-body table-border-style">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Full Name</th>
									<th>Email Address</th>
									<th>Phone Number</th>
									<th>Role</th>
									<th width="25%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allData as $key => $user)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $user->fullName }}</td>
									<td>{{ $user->emailAddress }}</td>
									<td>{{ $user->phoneNumber }}</td>
									<td>{{ $user->role }}</td>
									<td>
										<a href="{{ route('edit.user',$user->id) }}" class="btn btn-info">Edit</a>
										<a href="{{ route('delete.user',$user->id) }}" class="btn btn-danger" id="delete">Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
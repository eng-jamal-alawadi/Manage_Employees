@extends('layout.master')

@section('title', 'Manage Employees | Edit')

@section('content')
    @include('errors')
    <!-- ADD Modal HTML -->
{{-- <div id="addEmployeeModal" class="modal fade"> --}}
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{route('update',$employee->id)}}">
                @csrf
                @method('put')
				<div class="modal-header">
					<h4 class="modal-title">Update Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" value="{{$employee->name}}" >
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="{{$employee->email}}">
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="address" >{{$employee->address}}</textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Update">
				</div>
			</form>
		</div>
	</div>
{{-- </div> --}}
@endsection

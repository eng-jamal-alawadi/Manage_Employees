@extends('layout.master')

@section('title', 'Manage Employees | Home')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{session('success')}}
            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
        </div>
    @endif

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                                <span>Add New Employee</span></a>
                            {{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Delete</span></a> --}}
                        </div>
                    </div>
                </div>

                @php
                    $count = $employees->currentPage();
                    $count = ($count * 6) - 5;
                @endphp

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse  ($employees as $employee)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>

                            <a href="{{route('edit',$employee->id)}}" class="edit"  >
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="{{route('delete',$employee->id)}}" class="delete" onclick="return confirm('Are you sure ?')" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>


                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @empty
                            <tr>
                            <td colspan="5">No Data Found </td>
                            </tr>
                    @endforelse



                    </tbody>
                </table>

            </div>

        </div>
        <div class="mx-auto" style="width: 200px;">
            {{ $employees->links() }}
        </div>
    </div>



@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index(){
          $employees= Employee ::paginate(6);

        //   dd($employees);
        //  $employees= Employee :: get();

        return view('index')->with('employees',$employees);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        //الطريقة الاولى لحفظ البيانات
        // $employee= new Employee;
        // $employee->name= $request->name;
        // $employee->email= $request->email;
        // $employee->address= $request->address;
        // $employee->phone= $request->phone;
        // $employee->save();
        //return view('index')->with('employees',$employee);

        // الطريقة الثانية لحفظ البيانمات
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect('home')->with('success','Employee added successfuly');


    }

    public function delete($id){
        Employee::find($id)->delete();
        return redirect()->back();

    }

    public function edit($id){
        $employee = Employee::find($id);
        return view('edit',compact('employee'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        Employee::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect('home')->with('success','Employee updated successfuly');



    }



}

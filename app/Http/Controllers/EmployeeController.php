<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(){
        $employees = DB::table('employees')->paginate(10);
        return view('employee.index',[
            'employees'=>$employees
        ]);
    }

    public function create(){
        $companies = Company::all();
        return view('employee.create',[
            'companies'=>$companies
        ]);
    }

    public function store(Request $request){

        $data = request()->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['email'],
            'phone'=>[''],
            'company_id'=>['required']
        ]);

       Employee::create($data);

        return redirect()->route('employee');
    }

    public function edit($employee){
        $companies = Company::all();
        $employe = Employee::find($employee);
        return view('employee.edit',[
            'employee'=>$employe,
            'companies'=>$companies
        ]);
    }

    public function update(Request $request){

        $data = request()->validate([
            'id'=>[''],
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['email'],
            'phone'=>[''],
            'company_id'=>['required']
        ]);

        $employee = Employee::find($request->id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company_id;
        $employee->save();

        return redirect()->route('employee');
    }

    public function delete(Request $request){
        $employee = Employee::find($request->id);
        $employee->delete();
        return redirect()->route('employee');
    }
}

<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(){
        $companies = DB::table('companies')->paginate(10);
        return view('company.index',[
            'companies'=>$companies
        ]);
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'name'=>['required'],
            'email'=>['email'],
            'logo'=>['image','dimensions:min_width=100,min_height=100']
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;

        if ($request->hasFile('logo')){
            $originalName = $request->file('logo')->getClientOriginalName();
            $extension = $request->file('logo')->getClientOriginalExtension();
            $completeName = $request->file('logo')->getFilename().$extension;
            $request->logo->storeAs('uploads', $completeName, 'public');
            $company->logo = $originalName;
            $company->logo_name = $completeName;
        }
        $company->save();

        return redirect()->route('company');
    }

    public function edit($company){
        $com = Company::find($company);
        return view('company.edit',[
            'company'=>$com
        ]);
    }

    public function update(Request $request){

        $data = request()->validate([
            'id'=>[''],
            'name'=>['required'],
            'email'=>['email'],
            'phone'=>[''],
            'logo'=>['image','dimensions:max_width=100,max_height=100']
        ]);

        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;

        if ($request->hasFile('logo')){
            $originalName = $request->file('logo')->getClientOriginalName();
            $extension = $request->file('logo')->getClientOriginalExtension();
            $completeName = $request->file('logo')->getFilename().$extension;
            $request->logo->storeAs('uploads', $completeName, 'public');
            $company->logo = $originalName;
            $company->logo_name = $completeName;
        }
        $company->save();

        return redirect()->route('company');
    }

    public function delete(Request $request){
        $company = Company::find($request->id);
        $company->delete();
        return redirect()->route('company');
    }
}

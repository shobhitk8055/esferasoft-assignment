@extends('layouts.app')

@section('content')

    <h1>Employees</h1>

    <div class="px-3 pt-3" style="background-color: white; border: black; border-width: 1px; border-style: solid;">
        <h4>Edit</h4>
        <form method="post" action="{{route('employee.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="form">
                <div class="row">
                    <div class="col">
                        <label for="first_name">First name*</label>
                        <input type="text" name="first_name" required id="first_name" required value="{{$employee->first_name}}" class="form-control" placeholder="first name">
                    </div>
                    <div class="col">
                        <label for="last_name">Last name*</label>
                        <input type="text" name="last_name" required id="last_name" value="{{$employee->last_name}}" class="form-control" placeholder="last name">
                    </div>
                </div>
                <input type="hidden" value="{{$employee->id}}" name="id">
                <div class="row">
                    <div class="col">
                        <label class="mt-2" for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$employee->email}}" placeholder="email">
                    </div>
                    <div class="col">
                        <label class="mt-2" for="phone">Phone</label>
                        <input type="phone" name="phone" class="form-control" id="phone" value="{{$employee->phone}}" placeholder="phone">
                    </div>
                </div>
                <div class="mt-2">
                    <label for="company">Company</label>
                    <select id="company" class="form-control" value="{{$employee->company_id}}" name="company_id">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"
                            @if($company->id === $employee->company_id)
                                selected
                                    @endif
                            >{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-2">Submit</button>
            </div>
        </form>
    </div>

@endsection
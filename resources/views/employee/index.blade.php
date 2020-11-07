@extends('layouts.app')

@section('content')

    <h1>Employees</h1>
    <a href="{{route('employee.create')}}" class="btn mt-2 btn-primary">Add Employee</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{--    {{Request::url() }}--}}
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Email</th>
            <th scope="col">phone</th>
            <th scope="col">company name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>

                <td>{{$employee->phone}}</td>
                <td>{{\App\Company::find($employee->company_id)->name}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('employee.edit',['employee'=>$employee->id])}}">edit</a>
                    <form method="post" action="{{route('employee.delete')}}">
                        <input type="hidden" name="id" value="{{$employee->id}}" value="id">
                        @csrf
                        <button class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <?php echo $employees->render(); ?>


@endsection

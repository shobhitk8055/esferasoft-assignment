@extends('layouts.app')

@section('content')

    <h1>Companies</h1>
    <a href="{{route('company.create')}}" class="btn mt-2 btn-primary">Add Company</a>

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
        <tr>
            <th scope="row">{{$company->id}}</th>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>
                <img width="40" height="40" src="{{"/storage/uploads/".$company->logo_name}}">
            </td>
            <td>{{$company->website}}</td>
            <td>
                <a class="btn btn-success" href="{{route('company.edit',['company'=>$company->id])}}">edit</a>
                <form method="post" action="{{route('company.delete')}}">
                    <input type="hidden" name="id" value="{{$company->id}}" value="id">
                    @csrf
                <button class="btn btn-danger">delete</button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>

    <?php echo $companies->render(); ?>


@endsection

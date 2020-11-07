@extends('layouts.app')

@section('content')

    <h1>Companies</h1>

    <div class="px-3 pt-3" style="background-color: white; border: black; border-width: 1px; border-style: solid;">
        <h4>Edit</h4>
        <form method="post" action="{{route('company.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="form">
                <div class="row">
                    <div class="col">
                        <label for="name">Name*</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{$company->name}}" placeholder="name">
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$company->email}}" placeholder="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="mt-2" for="website">Website</label>
                        <input type="text" name="website" class="form-control" id="website" {{$company->website}} placeholder="website">
                    </div>
                    <div class="col">
                        <label class="mt-2" for="logo">Logo</label>
                        <input type="file" name="logo" class="form-control-file">
                        <p class="badge badge-success">logo should be in jpg/png/svg format and size should not be more than 100x100 px</p>
                    </div>
                </div>

                <input type="hidden" value="{{$company->id}}" name="id">
                <button type="submit" class="btn btn-primary my-2">Submit</button>
            </div>
        </form>
    </div>

@endsection
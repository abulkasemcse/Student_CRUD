@extends('student.layout')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Edit Product</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('student.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data"
        style="margin-top: 20px;">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" value="{{$student->name}}" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <div class="form-check">{{$student->gender}}
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Male
                     </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                 Female
                </label>
                </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>

                    <input type="email" value="{{$student->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mobile Phone No:</strong>
                    <input type="number" class="form-control" value="{{$student->mobile_phone}}" id="number">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Class:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Enter Your Class" >{{$student->class}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Enter Your Address">{{$student->address}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <input type="file" name="image" value="{{$student->photo}}" class="form-control" placeholder="Enter Your Photo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

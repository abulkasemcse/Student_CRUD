@extends('student.layout')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Student Laravel 10 CRUD Application with Bootstrap</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student.create') }}">
                    Add New Product
                </a>
            </div>
        </div>
    </div>

    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" style="margin-top: 20px;">
        <tr>
            <th>No</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Mobile PHone NO</th>
            <th>Class</th>
            <th>Education Year</th>
            <th>Address</th>
            <th>Photo</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $student)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $product->image }}" width="100px"></td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->mobile_phone }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->education_year }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->photo }}</td>

                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('student.show', $student->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('student.edit', $student->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $student->links() !!}

@endsection

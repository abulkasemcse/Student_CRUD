<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::latest()->paginate(10);
        return view('student.index', compact('student'))  ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'mobile_phone' => 'required',
            'class' => 'required',
            'education_year' => 'required',
            'address' => 'required',
            'photo' => 'required|photo|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($photo = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }

        Student::create($input);

        return redirect()->route('student.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('student.show', compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'mobile_phone' => 'required',
            'class' => 'required',
            'education_year' => 'required',
            'address' => 'required',
            'photo' => 'required|photo|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($photo = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        } else {
            unset($input['photo']);
        }

        $Student->update($input);

        return redirect()->route('student.index')
            ->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}

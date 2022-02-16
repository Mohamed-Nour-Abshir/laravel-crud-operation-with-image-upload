<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\employee;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::orderBy('id','desc')->paginate(5);
        return view('pages.index', ['employees'=>$employees]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image'=>'required|string|max:255',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'pho_no'=>'required',
            'address'=>'required'
        ],
    [
        'image.required'=>'Please upload image',
        'first_name.required'=>'Please Enter Your First Name',
        'last_name.required'=>'please upload image',
        'email.required'=>'please upload image',
        'pho_no.required'=>'please upload image',
        'address.required'=>'please upload image'
    ]);
        
    
    $employee = new employee;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/',$filename);
            $employee->image = $filename;
        }
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->pho_no = $request->input('pho_no');
        $employee->address = $request->input('address');
        $employee->save();
        return redirect('/')->with('success', 'one employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employees = employee::find($id);
        return view('pages.edit', ['employees'=>$employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $employees = employee::find($request->id);
        if($request->hasFile('image')){
           
            $destanation_path = 'uploads/employee/'.$employees->image;
            if(File::exists($destanation_path)){
                File::delete($destanation_path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/',$filename);
            $employees->image = $filename;
        }
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->email = $request->email;
        $employees->pho_no = $request->pho_no;
        $employees->address = $request->address;
        $employees->save();
        return redirect('/')->with('success', 'one employee data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employees = employee::find($id);
        $destanation_path = 'uploads/employee/'.$employees->image;
            if(File::exists($destanation_path)){
                File::delete($destanation_path);
            }
        $employees->delete($id);
        return redirect('/')->with('success', 'one employee data Deleted');
    }
}

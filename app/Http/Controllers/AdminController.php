<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Requests\StaffRegister;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //get all admin users (staffs)
            $users = User::select("*")
            ->get();

            return response()->json([
                'success' => 200,
                'users' => $users,
            ]);
        }
        return view("admin.home");
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
    public function store(StaffRegister $request)
    {
        $newStaff = User::create([
            'role_id' => $request['role_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
       
        if ($newStaff) {
            return response()->json([
                'message' => 'Staff Created Successfully',
                'status' => 200,
            ]);
        }else {
            return response()->json([
                'message' => 'Staff Not Created',
                'status' => 400,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRegister $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $user->update($data);
        return response()->json([
            'success' => 200,
            'message' => 'User Successfully Updated'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'success' => 200,
            'message' => 'User Successfully Deleted',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros= User::where('name', 'like','%'.$texto.'%')->paginate(10);
        return view('user.index', compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('user.action',['user'=>new User()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $registro = new User();
        $registro->name=$request->input('name');
        $registro->email=$request->input('email');
        $registro->password = bcrypt($request->input('password'));
        $registro->save();
        //return redirect()->route('user.index');
        return response()->json([
            'status'=> 'success',
            'message'=> 'Record created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.action',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            "status"=> "success",
            "message"=> "Updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => $user->name . ' Eliminado'
        ]);
    }
}

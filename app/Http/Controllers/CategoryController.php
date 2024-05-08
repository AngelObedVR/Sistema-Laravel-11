<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$categories = Category::all();
        $texto = trim($request->get('texto'));
        //$registros = Category::paginate(10);
        $registros= Category::where('name', 'like','%'.$texto.'%')->paginate(10);
        return view('category.index', compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('category.create');
        $category = new Category();
        return view('category.action',['category'=>new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registro = new Category();
        $registro->name=$request->input('nombre');
        /* $registro->image= $request->input('image') ? str_replace(' ','',$request->input('image').'.png') : "img.png"; */
        $registro->image=  "img.png";
        $registro->save();
        //return redirect()->route('category.index');
        return response()->json([
            'status'=> 'success',
            'message'=> 'Record created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.action',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name=$request->nombre;
        $category->save();
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
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => $category->name . ' Eliminado'
        ]);
    }
}

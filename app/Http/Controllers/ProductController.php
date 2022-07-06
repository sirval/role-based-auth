<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::latest()->paginate(2);
        return view('product.index',[
            'items' => $items,
        ], compact($items));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fname' => 'required|string',
            'lname' => 'required|string',
           ]);
          
           if ($validator->fails()) {
               return redirect()->back()->with('error', 'Invalid Character Supplied');
           }
            try {
                Product::create([
                    'firstname' => $request->fname,
                    'lastname' => $request->lname,
                ]);
                return redirect()->route('product.index')->with('success', 'Data saved succesfully');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'An error was encountered');
            }
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'item' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.update', [
            'item' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(),[
            'fname' => 'required|string',
            'lname' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Invalid data provided');
        }
        try {
            // $update = Product::find($id->id);
            $product->update([
                'firstname' => $request->fname,
                'lastname' => $request->lname,
            ]);
            return redirect()->route('product.index')->with('success', 'Update Successful') ;
        } catch (\Exception $e) {
            return back()->with('error', 'An error was encountered');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
            
            return response()->json([
                                        'status'=>'ok', 
                                        'data'=>['url'=>route('product.index')],
                                        'message'=>"success."
                                    ], 200);
        //  return redirect()->route('product.index')->with('success', 'Item Deleted Successfully');
            
        }
        

    }
}

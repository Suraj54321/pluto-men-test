<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate(5);
        return view('product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::get(['id','name']);
        return view('product.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{   
            $response=Product::create([
                'name' => $request->name,
                'price' =>$request->price,
                'category_id' =>json_encode($request->parent_category_id)
            ]);
            
            if(!empty($response)){
                return redirect()->route('subcategory.index')->with('success','Data stored successfully');
            }
            else{
                return redirect()->route('subcategory.index')->with('success','Oops something wents wrong');
            }
           
            
            }catch (Exception $e) {
                return $e->getMessage().'-'.$e->getLine();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('id','=',$id)->get();
        $category=Category::get(['id','name']);
        return view('product.edit',['category'=>$category,'data' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        try{   
             
            $response=Product::where('id','=',$id)->update($request->validated());
            if(!empty($response)){
                return redirect()->route('category.index')->with('success','Data updated successfully');
            }
            else{
                return redirect()->route('category.index')->with('success','Oops something wents wrong');
            }
           
            
            }catch (Exception $e) {
                return $e->getMessage().'-'.$e->getLine();
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
        try{    
            $response=Product::where('id','=',$id)->delete();
            if(!empty($response)){
                return redirect()->route('subcategory.index')->with('success','Data deleted successfully');
            }
            else{
                return redirect()->route('subcategory.index')->with('success','Oops something wents wrong');
            }
           
            
            }catch (Exception $e) {
                return $e->getMessage().'-'.$e->getLine();
        }
    }
}

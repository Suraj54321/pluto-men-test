<?php

namespace App\Http\Controllers;

use App\Models\SubCatgeory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;


class SubCatgeoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory=SubCatgeory::with('category')->paginate(5);
        return view('subcategory.index',['subcategory'=>$subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::get(['id','name']);
        $subcategory=SubCatgeory::get(['id','name']);
        return view('subcategory.create',['category'=>$category,'subcategory'=>$subcategory]);
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
            $childCat=$request->child_category_id;
            $response=SubCatgeory::create([
                'name' => $request->name,
                'parent_category_id' => $request->parent_category_id,
                'child_category_id' =>json_encode($childCat)
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
     * @param  \App\Models\SubCatgeory  $subCatgeory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCatgeory $subCatgeory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCatgeory  $subCatgeory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::get(['id','name']);
        $subcategory=SubCatgeory::get(['id','name']);
        $data=SubCatgeory::where('id','=',$id)->with('category')->get();
        return view('subcategory.edit',['data'=>$data,'category'=>$category,'subcategory'=>$subcategory,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCatgeory  $subCatgeory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        try{    
            $childCat=$request->child_category_id->map(function($value,$key){
                dd($value->child_category_id);
                return [$value->child_category_id];
            });
            dd($childCat);
            $response=SubCatgeory::where('id','=',$id)->update($request->validated());
            if(!empty($response)){
                return redirect()->route('subcategory.index')->with('success','Data updated successfully');
            }
            else{
                return redirect()->route('subcategory.index')->with('success','Oops something wents wrong');
            }
           
            
            }catch (Exception $e) {
                return $e->getMessage().'-'.$e->getLine();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCatgeory  $subCatgeory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{    
            $response=SubCatgeory::where('id','=',$id)->delete();
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

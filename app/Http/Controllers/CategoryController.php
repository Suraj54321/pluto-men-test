<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $category=Category::paginate(5);
            return view('category.index',['categorys'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
                $response=Category::create($request->validated());
                if(!empty($response)){
                    return redirect()->route('category.index')->with('success','Data stored successfully');
                }
                else{
                    return redirect()->route('category.index')->with('success','Oops something wents wrong');
                }
               
                
        }catch (Exception $e) {
            return $e->getMessage().'-'.$e->getLine();
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
        $data=Category::find($id);
        return view('category.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{    
            $response=Category::where('id','=',$id)->update($request->validated());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{    
            $response=Category::where('id','=',$id)->delete();
            if(!empty($response)){
                return redirect()->route('category.index')->with('success','Data deleted successfully');
            }
            else{
                return redirect()->route('category.index')->with('success','Oops something wents wrong');
            }
           
            
            }catch (Exception $e) {
                return $e->getMessage().'-'.$e->getLine();
        }
    }
}

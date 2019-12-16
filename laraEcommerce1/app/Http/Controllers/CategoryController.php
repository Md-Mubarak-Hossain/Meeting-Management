<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use DB;
class CategoryController extends Controller
{
    public function index(){
    	return view('admin.category.categoryEntry');
    }

    public function save(Request $request){
    	$categoryEntry=new category();
    	$categoryEntry->categoryName=$request->name;
    	$categoryEntry->shortDescription=$request->shortDescription;
        $categoryEntry->categoryName=$request->name;
        $categoryEntry->publicationStatus=$request->publicationStatus;
        $categoryEntry->save();

        return redirect('/category/save')->with('message','data insert successfully');



    }

    public function manage(){
        $categories= DB::table('categories')->paginate(8);

        return view('admin.category.categoryManage',['category'=>$categories]);
    }

    public function edit($id){
       $categoryEdit=category::where('id',$id)->first();
       return view('admin.category.categoryEdit',['category'=>$categoryEdit]);
    }
    public function update(Request $request){
      $category=category::find($request->categoryId);
      $category->categoryName=$request->name;
      $category->shortDescription=$request->shortDescription;
      $category->publicationStatus=$request->publicationStatus;
      $category->save();

      return redirect('/category/manage')->with('message','Updated successfully');
    }

    public function delete($id){
      $categoryDelete=category::find($id);
      $categoryDelete->delete();

      return redirect('/category/manage')->with('message','Deleted Successfully');
    }
}

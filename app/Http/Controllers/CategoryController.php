<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function category_index()
    {
        $user = Auth::user();
        $resul_category= Category::where('user_id',$user->id)->get();
        return view('category.category',['resul_category'=> $resul_category]);
    }
    public function category_create(Request $request)
    {
        $request->validate(['name_cat'=>'required']);
        $user = Auth::user();
        $resul_category= Category::where('user_id',$user->id)->where('name_cat',$request->post('name_cat'))->first();
        if($resul_category)
        {
            return redirect()->back();
        }
        $user = Auth::user();
        $model= new Category();
        $model->name_cat=$request->post('name_cat');
        $model->user_id=$user->id;
        $model->save();
        $request->session()->flash('message', __('lang.AddSuccessfully'));
        return redirect('/');
    } 
    public function category_update(Request $request)
    {
        $request->validate([
            'name_cat'=>'required|unique:categorys,user_id'
        ]);
        $model= Category::find($request->post('id'));
        $model->name_cat=$request->post('name_cat');
        $model->save();
        $request->session()->flash('message', __('lang.EditSuccessfully'));
        return redirect('/category');
    } 
    public function destroy(Request $request, $id)
    {
        $model= Category::find($id);
        $model->delete();
        $request->session()->flash('message', __('lang.DeleteSuccessfully'));
        return redirect('/category');
    }
}

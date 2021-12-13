<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Product;

class ExcelController extends Controller
{
    public function export()
    {
        $user = Auth::user();
        $stt= 1;
        return (new FastExcel(Product::join('categorys','categorys.id','=','products.cat_id')
        ->where('products.user_id',$user->id)->where('completed','0')->get()))
        ->download('danhsach.xlsx',function($product){
            return [
                @lang('lang.ProductName') => $product->title,
                @lang('lang.description') => $product->content,
                @lang('lang.category')    => $product->name_cat,
            ];
        });
    }
}
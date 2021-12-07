<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ShoppingListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $resul_category= Category::where('user_id',$user->id)->get();
        $resul_product= Product::where('user_id',$user->id)->where('completed',0)->get();
        $resul_product_complete= Product::where('user_id',$user->id)->where('completed',1)->get();
        return view('shopping.index',['resul_category'=>$resul_category,
                                        'resul_product'=>$resul_product,
                                        'resul_product_complete'=>$resul_product_complete
                                        ]);
    }
    public function index_category($id)
    {
        $user = Auth::user();
        $resul_category= Category::where('user_id',$user->id)->get();
        $resul_product= Product::where('user_id',$user->id)->where('cat_id',$id)->where('completed',0)->get();
        $resul_product_complete= Product::where('user_id',$user->id)->where('cat_id',$id)->where('completed',1)->get();
        return view('category.category_index',['resul_category'=>$resul_category,
                                                'resul_product'=>$resul_product,
                                                'resul_product_complete'=>$resul_product_complete
                                                ]);
    }
    
    //Share Mail
    public function shareMail(Request $request){
        $now    = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title  = 'Danh sách Shopping ngày '.$now;
        $data   = $request->email;
        $user   = Auth::user();
        $products = Product::join('categorys', 'categorys.id', '=', 'products.cat_id')->where('products.user_id',$user->id)->get();
        Mail::send('shopping.shareMail',['user'=>$user, 'products'=>$products],function($message) use ($title,$data){
            $message->to($data)->subject($title);
            $message->from($data,$title);
        });
        return redirect()->back()->with('msg', 'Bạn đã chia sẻ danh sách thành công!');
    }

    public function create()
    {
        return view('shopping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('shopping.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteAll($id)
    {
        //
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;
use Session;
session_start();

use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ShoppingListController extends Controller
{
    public function index()
    {
        //->join('categorys','categorys.id','=','products.cat_id')
        $user = Auth::user();
        $resul_category= Category::where('user_id',$user->id)->get();
        $resul_product= Product::where('products.user_id',$user->id)
                                ->where('completed','0')->get();
        $resul_product_complete= Product::with('category')->where('completed','1')->where('user_id',$user->id)->get();
        $count= $resul_product_complete->count();
        return view('shopping.index',['resul_category'=>$resul_category,
                                        'resul_product'=>$resul_product,
                                        'resul_product_complete'=>$resul_product_complete,
                                        'count'=>$count
                                        ]);
    }
    public function index_category($id)
    {
        $user = Auth::user();
        $resul_category= Category::where('user_id',$user->id)->get();
        $resul_product= Product::where('user_id',$user->id)->where('cat_id',$id)->where('completed',0)->get();
        $resul_product_complete= Product::where('user_id',$user->id)->where('cat_id',$id)->where('completed',1)->get();
        $count= $resul_product_complete->count();
        return view('category.category_index',['resul_category'=>$resul_category,
                                                'resul_product'=>$resul_product,
                                                'resul_product_complete'=>$resul_product_complete,
                                                'count'=>$count
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
        $cate_product = DB::table('categorys')->orderby('id', 'desc')->get();
        return view('shopping.create')->with('cate_product', $cate_product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $user = Auth::user();
        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['cat_id'] = $request->product_cate;
        $data['user_id'] = $user->id;        
        $data['created_at'] = $request->created_at;
        $data['image'] = $request->product_image;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads',$new_image);
            $data['image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return redirect("/");
        }

        $data['image'] = '';
        DB::table('products')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return redirect("/");
    }
    public function destroyProduct(Request $request,$id)
    {
        $model= Product::find($id);
        $model->delete();
        $request->session()->flash('message','Đã Xóa');
        return redirect('/');
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
        $user = Auth::user();
        $cate_product = DB::table('categorys')->orderby('id', 'desc')->get();
        $edit_product = Product::with('category')->where('products.id',$id)->get();
        $manager_product = view('shopping.edit')->with('edit_product',$edit_product)->with('cate_product',$cate_product); 
        //return view('list.edit')->with('manager_product',$manager_product);
        return view('shopping.edit', ['manager_product' => $manager_product, 'edit_product' => $edit_product, 'cate_product' => $cate_product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $user = Auth::user();
        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['cat_id'] = $request->product_cate;
        $data['user_id'] = $user->id;        
        $data['created_at'] = $request->created_at;
        $data['image'] = $request->product_image;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads',$new_image);
            $data['image'] = $new_image;
            DB::table('products')->where('id', $id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return redirect('/');
        }else {
            $data['image'] = $request->old_image;
        }
        DB::table('products')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return redirect('/');
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

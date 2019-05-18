<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index(){
        // return view('wraper.page.home');
        $newproduct = Product::orderBy('id','desc')->get();
        return view('wraper.page.home',compact('newproduct'));

    }
    public function product(){
        return view('admin.product.listall');

    }
    public function category($id){
        $product = Product::where('category_id','=',$id)->paginate(9);
        $category = Category::find($id);
        $producsell = Product::take(10)->orderBy('sale','desc')->get();
        return view('wraper.page.category',compact('product', 'producsell', 'category'));
    }
    public function store(){
        return view('wraper.page.store');
    }
    public function detail($id){
        $detailproduct = Product::find($id);
        $relatedproduct = Product::where('category_id','=',$detailproduct->category->id)->where('id','<>',$id)->paginate(4);
        // dd($relatedproduct);
        return view('wraper.page.detail',compact('detailproduct', 'relatedproduct'));
    }
}

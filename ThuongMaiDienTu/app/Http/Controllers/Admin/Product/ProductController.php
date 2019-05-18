<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use DB;
class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(2);
        return view('admin.product.listall',compact('products'));
    }
    public function create(){
        $cate = Category::where('parent_id','!=', NULL)->get();
        $tree =array();
        foreach($cate as $vl){
            $tree[$vl->id] = $vl->name;
        }
        return view('admin.product.createProduct', compact('tree'));
    }

    public function store(CreateRequest $request){
        // $user = Sentinel::getUser();
        
        DB::beginTransaction();
        try{
            $input = $request->all();
            
            $input['name'] =  $input['nameproduct']['vi'];
            $input['price'] = $input['price']?$input['price']:0;
            $input['count'] = $input['count']?$input['count']:0;
            $input['brand'] = $input['brandproduct']['vi'];
            $input['category_id'] = $input['category_id']?$input['category_id']:0;
            $input['status'] =$input['status']?$input['status']:0;
            $input['description'] =  $input['descriptionproduct']['vi'];
            // dd($input);
            $product = Product::create($input);
           
            $locales = config('app.locales');
            
            foreach ($locales as $l=>$val){
                $product_translation = new ProductTranslation();
                $product_translation->products_id= $product->id;
                $product_translation->lang = $l;
                $product_translation->name = $input['nameproduct'][$l]?$input['nameproduct'][$l]:'';
                $product_translation->description = $input['descriptionproduct'][$l]?$input['descriptionproduct'][$l]:'';
                $product_translation->brand = $input['brandproduct'][$l]?$input['brandproduct'][$l]:'';
                $product_translation->save();
            }
        }catch (\Exception $e){
            DB::rollBack();
            return back()
            ->withInput()
            ->with('err', $e->getMessage());
        }
        DB::commit();
        return redirect(route('product.list'))->with('success', 'Created successfully!');
    }
    public function edit($id){
        $product = Product::find($id);
        $cate = Category::where('parent_id','!=', NULL)->get();
        $tree =array();
        foreach($cate as $vl){
            $tree[$vl->id] = $vl->name;
        }
 
        return view('admin.product.editProduct', compact('tree','product'));
    }
    public function update(UpdateRequest $request,$id){
        $input = $request->all();
        $input['status'] = isset($input['status'])?$input['status'] : 0;
        if($input['img'] == null){    
        }
        $product = Product::find($id);
        // dd($input);
        if($product){
            DB::beginTransaction();
            try{
                $product->update($input);

                $locales = config('app.locales');
                foreach ($locales as $l=>$val){
                    $product_translation = $product->translation($l);
                    $product_translation->name = $input['nameproduct'][$l]?$input['nameproduct'][$l]:'';
                    $product_translation->description = $input['descriptionproduct'][$l]?$input['descriptionproduct'][$l]:'';
                    $product_translation->brand= $input['brandproduct'][$l]?$input['brandproduct'][$l]:'';
                    $product_translation->save();
                }
            }catch (\Exception $e){
                dd($e->getMessage());
                DB::rollBack();
                return back()
                ->withInput()
                ->with('err', $e->getMessage());
            }
            DB::commit();
        }
        return redirect(route('product.list'))
        ->with('success', 'Updated successfully!');
    }
    public function delete(Request $request){
        $id = $request->input('id', 0);
        $product = Product::find($id);
        if($product){
            $product->delete();
        }

        return redirect(route('product.index'))
        ->with('success', 'Deleted successfully!');
    }
}

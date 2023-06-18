<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\sub_subcategory;
use Carbon\Carbon;
use App\Models\Product;

use Image;


class ProductController extends Controller
{
    //
    public function productView(){
        $products=Product::orderBy('product_name_en','ASC')->get();
        
        return view('product_view',compact('products'));
    }

    public function addProduct(){
        $brands=Brand::latest()->get();
        $categories=Category::latest()->get();
        return view('product_add',compact('brands','categories'));
    }

    public function editProduct($id){
        $product=Product::findOrFail($id);
        $brands=Brand::orderBy('brand_name_en','ASC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcat=SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcat=sub_subcategory::orderBy('subsubcategory_name_en','ASC')->get();
 
        return view('product_edit',compact('product','brands','categories','subcat','subsubcat'));
    }

    public function getSubcategory($id){
        $subcat=SubCategory::where('category_id',$id)->orderBy('subcategory_name_en','ASC')->get();
       // print($subcat);
        return json_encode($subcat);
    }

    public function getSubSubcategory($id){
        $subsubcat=sub_subcategory::where('subcategory_id',$id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function storeProduct(Request $request){
       /* $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        ]);
    
        if ($files = $request->file('file')) {
            $destinationPath = 'upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$digitalItem);
        }*/



        $image=$request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail/'.$name_gen);
        $save_url='upload/product/thumbnail/'.$name_gen;

        $product_id=Product::insertGetId([
        'brand_id'=>$request->brand_id,
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
        'sub_subcategory_id'=>$request->subsubcategory_id,
        'product_name_en'=>$request->product_name_en,
        'product_name_hi'=>$request->product_name_hi,
        'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en)),
        'product_slug_hi'=>str_replace(' ','-',$request->product_name_hi),
        'product_code'=>$request->product_code,
        'product_qty'=>$request->product_qty,
        'product_tags_en'=>$request->product_tags_en,
        'product_tags_hi'=>$request->product_tags_hi,
        'product_size_en'=>$request->product_size_en,
        'product_size_hi'=>$request->product_size_hi,
        'product_color_en'=>$request->product_color_en,
        'product_color_hi'=>$request->product_color_hi,
        'selling_price'=>$request->selling_price,
        'discount_price'=>$request->discount_price,
        'short_descp_en'=>$request->short_descp_en,
        'short_descp_hi'=>$request->short_descp_hi,
        'long_descp_en'=>$request->long_descp_en,
        'long_descp_hi'=>$request->long_descp_hi,
        'product_thumbnail'=>$save_url,
        'hot_deals'=>$request->hot_deals,
        'featured'=>$request->featured,
        'special_offer'=>$request->special_offer,
        'special_deals'=>$request->special_deals,
    //    'digital_file' => $digitalItem,

        'status'=>1,
        'created_at'=>Carbon::now(),
        ]);

       $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }

    public function updateProduct(Request $request){
        /* $request->validate([
             'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
         ]);
     
         if ($files = $request->file('file')) {
             $destinationPath = 'upload/pdf'; // upload path
             $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
             $files->move($destinationPath,$digitalItem);
         }*/
         $product_id=$request->product_id;
         if($request->file('product_thumbnail')){
            unlink($request->old_img);
            $image=$request->file('product_thumbnail');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/product/thumbnail/'.$name_gen);
            $save_url='upload/product/thumbnail/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'product_thumbnail' => $save_url,
            ]);
        }
         
         
         $product_id=Product::findOrFail($product_id)->update([
         'brand_id'=>$request->brand_id,
         'category_id'=>$request->category_id,
         'subcategory_id'=>$request->subcategory_id,
         'sub_subcategory_id'=>$request->subsubcategory_id,
         'product_name_en'=>$request->product_name_en,
         'product_name_hi'=>$request->product_name_hi,
         'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en)),
         'product_slug_hi'=>str_replace(' ','-',$request->product_name_hi),
         'product_code'=>$request->product_code,
         'product_qty'=>$request->product_qty,
         'product_tags_en'=>$request->product_tags_en,
         'product_tags_hi'=>$request->product_tags_hi,
         'product_size_en'=>$request->product_size_en,
         'product_size_hi'=>$request->product_size_hi,
         'product_color_en'=>$request->product_color_en,
         'product_color_hi'=>$request->product_color_hi,
         'selling_price'=>$request->selling_price,
         'discount_price'=>$request->discount_price,
         'short_descp_en'=>$request->short_descp_en,
         'short_descp_hi'=>$request->short_descp_hi,
         'long_descp_en'=>$request->long_descp_en,
         'long_descp_hi'=>$request->long_descp_hi,
         'hot_deals'=>$request->hot_deals,
         'featured'=>$request->featured,
         'special_offer'=>$request->special_offer,
         'special_deals'=>$request->special_deals,
     //    'digital_file' => $digitalItem,
 
         'status'=>1,
         'updated_at'=>Carbon::now(),
         ]);
 
        $notification = array(
             'message' => 'Product Updated Successfully',
             'alert-type' => 'info'
         );
         return redirect()->back()->with($notification);
     }

     public function deleteProduct($id){
        $product=Product::findOrFail($id);
        $img=$product->product_thumbnail;
        unlink($img);

        Product::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

     }

}

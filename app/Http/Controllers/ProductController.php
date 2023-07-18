<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index():View
    {
        $products = DB::select('select * from products');

        return view('pages.products',compact('products'));
    }
    public function add():View
    {
        return view('pages.addproduct');
    }
    public function store(Request $request)
    {
        
        $data= new Product();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        
        $data = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$data['image']= $filename,
            'user_id'=>$request->user_id, 
        ]);
        $data->save();


        return back()->with('success', 'Product has been created successfully!');
    }
    public function update(Product $p,string $id): RedirectResponse
    {
        $p = Product::find($id);
        
        $p->sold = 1;
      
        $p->save();

        return redirect()->back()->with('success','Product has been bought successfully!');
    }

    public function edit(Product $prod, $id){
        $prod = Product::find($id);
        return view('pages.edit',compact('prod'));
    }

    public function edited(Product $prod, Request $request , $id):RedirectResponse
    {
        $prod = Product::find($id);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $prod['image']= $filename;
        }
        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->user_id = $request->user_id;
        $prod->image = $prod['image']= $filename;

        $prod->save();
        return redirect()->back()->with('success','Product has been changed successfully!');
    }

    public function myproducts(){
        $products = DB::select('select * from products where sold=1');
        return view('pages.myproduct')->with('myproduct', $products);
    }


    public function remove($id){
        $products = Product::find($id);
        $products->sold = 0;
        $products->save();
        return redirect()-> route('product.my')->with('success', 'Product removed successfully!');
    }
    public function delete($id){
        Product::destroy($id);
        return back()->with('success','Product has been deleted successfully!');
    }
}

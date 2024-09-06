<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
  public function store(Request $request)
  {
      // Validación del request
      $validator = Validator::make(
          $request->all(),
          [
              'name' => 'required|string|max:255',
              'description' => 'required|string',
              'price' => 'required|integer',
              'state_id'=>'required|integer',
              'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
          ]
      );
  
      // Manejo de errores de validación
      if ($validator->fails()) {
          return response()->json([
              'message' => 'All fields are mandatory',
              'errors' => $validator->messages()
          ], 422);
      }
  
      // Creación del producto
      $product = Product::create([
          'name' => $request->name,
          'description' => $request->description,
          'price' => $request->price,
          'state_id'=>1
      ]);

      //Guardar las imagenes

      if($request->hasFile('images')){
        foreach($request->file('images') as $image){
            $path=$image->store('products');
            Image::create([
                'product_id'=>$product->id,
                'path'=>$path
            ]);
        }
      }
  
      // Respuesta de éxito
      return response()->json([
          'message' => 'Product created successfully',
          'data' => new ProductResource($product)
      ], 201);
  }
  
  public function index(){
    $products=Product::with("images")->get();
    if($products->count()>0){
      return ProductResource::collection($products);
    }else{
        return response()->json(['message'=>'No record available'],200);
    }
  }

  public function show(Product $product){
    $product->state();
        return new ProductResource($product);
  }

  public function update(Request $request,Product $product)  {
          // Validación del request
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|integer'
            ]
        );
    
        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Creación del producto
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
    
        // Respuesta de éxito
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ], 200);
  }

  public function destroy(Product $product){
    $product->delete();
    return response()->json([
        'message'=>'Product Deleted Succesfully'
    ],200);

  }
}

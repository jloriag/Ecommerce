<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductController extends Controller
{
  public function store(Request $request)
  {
      // Validación del request
      $validator = $this->validate($request);
  
      // Manejo de errores de validación
      if ($validator->fails()) {
          return response()->json([
              'message' => 'All fields are mandatory',
              'errors' => $validator->messages()
          ], 422);
      }
  
      // Creación del producto
      $product = Product::create($this->fields($request));

      $this->saveAllImages($request->input('images'),$product );
  
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
        $validator = $this->validate($request);
    
        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'errors' => $validator->messages()
            ], 422);
        }
    
        // Creación del producto
        $product->update($this->fields($request));

        $this->saveAllImages($request->input('images'), $product );
    
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

  private function saveAllImages($imagesArray,$product){

    foreach($imagesArray as $base64Image){
      // Decode the base64 string
      $imageParts = explode(";base64,", $base64Image);
      $imageTypeAux = explode("image/", $imageParts[0]);
      $imageType = $imageTypeAux[1]; // Get image type (e.g., png, jpg, etc.)
      $imageBase64 = base64_decode($imageParts[1]);

      // Define a unique filename
      $fileName = uniqid() . '.' . $imageType;

      // Save the image to the storage (you can use public or private storage)
      Storage::disk('public')->put('products/' . $fileName, $imageBase64);

      // Return success response with the saved file URL
      $filePath = Storage::url('products/' . $fileName);
          Image::create([
              'product_id'=>$product->id,
              'path'=>$filePath
          ]);
      }

  }

  private function fields(Request $request){
    return [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'brand'=>$request->brand,
        'amount'=>$request->amount,
        'sku'=> $request->sku,
        'state_id'=>1
    ];
  }

  private function validate(Request $request){
   return Validator::make(
        $request->all(),
        [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'state_id'=>'required|integer',
            'brand'=>'required|string',
            'sku'=>'required|string',
            'images.*' => 'required|string'
        ]
    );
  }
}

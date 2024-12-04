<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EcommerceData;
use App\Http\Resources\EcommerceDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class EcommerceDataController extends Controller {

    public function store(Request $request) {

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
        $ecommerceData = $this->fields($request);
        $ecommerceData['webpage_banner'] = $this->saveBanner($ecommerceData['webpage_banner']);
        $ecommerceData['webpage_icon'] = $this->saveFaviIcon($ecommerceData['webpage_icon']);
        $ecommerDataC = EcommerceData::create($ecommerceData);

        // Respuesta de éxito
        return response()->json([
                    'message' => 'Product created successfully',
                    'data' => new EcommerceDataResource($ecommerDataC)
                        ], 201);
    }
    
    public function show($id){
            $data = EcommerceData::find($id);
       //return response()->json(['data' => $data]);
           return new EcommerceDataResource($data);
     }

    public function saveBanner($base64Image) {

        // Decode the base64 string
        $imageParts = explode(";base64,", $base64Image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1]; // Get image type (e.g., png, jpg, etc.)
        $imageBase64 = base64_decode($imageParts[1]);

        // Define a unique filename
        $fileName = uniqid() . '.' . $imageType;

        // Save the image to the storage (you can use public or private storage)
        Storage::disk('public')->put('images/general/banner/' . $fileName, $imageBase64);

        // Return success response with the saved file URL
        $filePath = Storage::url('images/general/banner/' . $fileName);
        return $filePath;
    }
    
    public function saveFaviIcon($base64Image) {

        // Decode the base64 string
        $imageParts = explode(";base64,", $base64Image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1]; // Get image type (e.g., png, jpg, etc.)
        $imageBase64 = base64_decode($imageParts[1]);

        // Define a unique filename
        $fileName = uniqid() . '.' . $imageType;

        // Save the image to the storage (you can use public or private storage)
        Storage::disk('public')->put('images/general/favicon/' . $fileName, $imageBase64);

        // Return success response with the saved file URL
        $filePath = Storage::url('app/public/images/general/favicon/' . $fileName);
        return $filePath;
    }

    private function fields(Request $request) {
        return [
            'name' => $request->name,
            'webpage_banner' => $request->webpage_banner,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'webpage_icon' => $request->webpage_icon,
        ];
    }

    private function validate(Request $request) {
        return Validator::make(
                        $request->all(),
                        [
                            'name' => 'required|string|max:255',
                            'webpage_banner' => 'required|string',
                            'email' => 'required|string',
                            'instagram' => 'required|string',
                            'facebook' => 'required|string',
                            'whatsapp' => 'required|string',
                            'webpage_icon' => 'required|string',
                        ]
        );
    }
}

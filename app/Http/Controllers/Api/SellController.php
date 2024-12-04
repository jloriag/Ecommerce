<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SellResource;
use Illuminate\Http\Request;
use App\Models\Sell;

class SellController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $sell = Sell::create($this->fields($request));
        
        // Respuesta de éxito
        return response()->json([
                    'message' => 'Product created successfully',
                    'data' => new SellResource($sell)
                        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    private function fields(Request $request) {
        return [
            'paid_method' => $request->paid_method,
            'state' => $request->state,
        ];
    }

    private function validate(Request $request) {
        return Validator::make(
                        $request->all(),
                        [
                            'name' => 'required|string|max:255',
                            'description' => 'required|string',
                            'price' => 'required|integer',
                            'amount' => 'required|integer',
                            'state_id' => 'required|integer',
                            'brand' => 'required|string',
                            'sku' => 'required|string',
                            'images.*' => 'required|string'
                        ]
                );
    }
}

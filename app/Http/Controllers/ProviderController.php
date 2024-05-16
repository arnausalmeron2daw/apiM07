<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();

        if ($providers->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No providers found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $providers
        ], 200);
    }

    public function show($id)
    {
        $provider = Provider::find($id);

        if (!$provider) {
            return response()->json([
                'success' => false,
                'message' => 'Provider with id ' . $id . ' not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $provider
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);

        if (!$provider) {
            return response()->json([
                'success' => false,
                'message' => 'Provider with id ' . $id . ' not found'
            ], 404);
        }

        $provider->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $provider
        ], 200);
    }

    public function destroy($id)
    {
        $provider = Provider::find($id);

        if (!$provider) {
            return response()->json([
                'success' => false,
                'message' => 'Provider with id ' . $id . ' not found'
            ], 404);
        }

        // Eliminar el proveedor
        $provider->delete();

        return response()->json([
            'success' => true,
            'message' => 'Provider deleted successfully'
        ], 200);
    }

    public function store(Request $request)
    {

        //dd($request->all());

            $validatedData = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',
                'phone' => 'required|integer',
                'email' => 'required|email|unique:providers,email'
            ]);



            $provider = Provider::create($request->all());

            return response()->json([
                'success' => true,
                'data' => $provider
            ], 201);

    }
}

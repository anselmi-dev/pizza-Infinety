<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use Validator;
use Lang;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::orderBy('created_at', 'desc')->paginate(6);

        return response()->json([
            'data' => $pizzas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:pizzas|string|min:3',
            'price' => 'required',
            'ingredients' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->errors()
            ], 400); // 400 being the HTTP code for an invalid request.
        }

        if ($request->file('file')) {
            $request['image'] = url(\Storage::url($request->file->store('public')));
        }

        $pizza = Pizza::create($request->all());

        $pizza->ingredients()->sync(array_column(json_decode($request->ingredients), 'id'));

        return response()->json([
            'data' => $pizza
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json([
                'message' => Lang::get('Pizza not found')
            ], 404);
        }

        return response()->json([
            'data' => $pizza
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json([
                'message' => Lang::get('Pizza not found')
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|unique:pizzas,name,'.$pizza->id,
            'price' => 'required',
            'ingredients' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->errors()
            ], 400); // 400 being the HTTP code for an invalid request.
        }

        if ($request->file('file')) {
            $request['image'] = url(\Storage::url($request->file->store('public')));
        }

        $pizza->update($request->all());

        $pizza->ingredients()->sync(array_column(json_decode($request->ingredients), 'id'));

        return response()->json([
            'data' => $pizza
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json([
                'message' => Lang::get('Pizza not found')
            ], 404);
        }

        $pizza->destroy($id);

        return response()->json([
            'data' => $pizza
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function storageImage (Request $request) {

        if ($request->file('image')) {

            $path = $request->file->store('users', 'local');

            return $path;
        }

        return null;
    }
}

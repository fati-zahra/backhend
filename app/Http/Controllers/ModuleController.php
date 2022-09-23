<?php
namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user
            ->module()
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        //Validate data
        $data = $request->only('name', 'nbrh');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'nbrh' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $module = $this->user->module()->create([
            'name' => $request->name,
            'nbrh' => $request->nbrh
           
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $module
        ], Response::HTTP_OK);
    }*/
    ////////////
    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'nbrh' => 'required|integer',
    ]);
 
    $module = new Module();
    $module->name = $request->name;
    $module->nbrh = $request->nbrh;
 
    if ($this->user->module()->save($module))
        return response()->json([
            'success' => true,
            'module' => $module
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'Sorry, module could not be added'
        ], 500);
}
////////////////////
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = $this->user->module()->find($id);
    
        if (!$module) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }
    
        return $module;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //Validate data
        $data = $request->only('name', 'nbrh');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'nbrh' => 'required'
           
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $module = $module->update([
            'name' => $request->name,
            'nbrh' => $request->nbrh
           
        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'module updated successfully',
            'data' => $module
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'module deleted successfully'
        ], Response::HTTP_OK);
    }
}
<?php
namespace App\Http\Controllers;

use App\Models\Prof;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ProfController extends Controller
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
            ->prof()
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
    public function store(Request $request)
    {
        //Validate data
        $data = $request->only('fullname', 'email');
        $validator = Validator::make($data, [
            'fullname' => 'required|string',
            'email' => 'required',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $prof = $this->user->prof()->create([
            'fullname' => $request->fullname,
            'email' => $request->email,

           
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'prof created successfully',
            'data' => $prof
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prof  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prof = $this->user->prof()->find($id);
    
        if (!$prof) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, prof not found.'
            ], 400);
        }
    
        return $prof;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prof  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( Prof $prof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prof  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prof $prof)
    {
        //Validate data
        $data = $request->only('fullname', 'email');
        $validator = Validator::make($data, [
            'fullname' => 'required|string',
            'email' => 'required'

           
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $prof = $prof->update([
            'fullname' => $request->fullname,
            'email' => $request->email,

        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'prof updated successfully',
            'data' => $prof
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prof  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prof $prof)
    {
        $prof->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'prof deleted successfully'
        ], Response::HTTP_OK);
    }
}
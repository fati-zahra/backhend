<?php
namespace App\Http\Controllers;

use App\Models\PFE;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PFEController extends Controller
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
            ->PFE()
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
        $data = $request->only('subject','profsr','etu');
        $validator = Validator::make($data, [
            'subject' => 'required|string',
            'profsr' => 'required|string',
            'etu' => 'required|string',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $PFE = $this->user->PFE()->create([
            'subject' => $request->subject,
            'profsr' => $request->profsr,
            'etu' => $request->etu,

           
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'PFE created successfully',
            'data' => $PFE
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PFE  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PFE = $this->user->PFE()->find($id);
    
        if (!$PFE) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, PFE not found.'
            ], 400);
        }
    
        return $PFE;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PFE  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( PFE $PFE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PFE  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PFE $pfe)
    {
        //Validate data
        $data = $request->only('subject','profsr','etu');
        $validator = Validator::make($data, [
            'subject' => 'required|string',
            'profsr' => 'required|string',
            'etu' => 'required|string',


           
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $pfe = $pfe->update([
            'subject' => $request->subject,
            'profsr' => $request->profsr,
            'etu' => $request->etu,


        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'subject updated successfully',
            'data' => $pfe
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PFE  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(PFE $PFE)
    {
        $PFE->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'PFE deleted successfully'
        ], Response::HTTP_OK);
    }
}
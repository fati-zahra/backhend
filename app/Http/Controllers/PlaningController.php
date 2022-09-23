<?php
namespace App\Http\Controllers;

use App\Models\Planing;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PlaningController extends Controller
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
            ->planing()
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
        $data = $request->only('salle','name','modul1','modul2','modul3','modul4','modul5','modul6','modul7','modul8','modul9','modul10','modul12','modul12','modul13','modul14','modul15','modul16',
        'salle2','salle3','salle4','salle5','salle6','salle7','salle8','salle9','salle10','salle11','salle12','salle13','salle14','salle15','salle16');
        $validator = Validator::make($data, [
            
            'salle' => '',
            'salle2' => '',
            'salle3' => '',
            'salle4' => '',
            'salle5' => '',
            'salle6' => '',
            'salle7' => '',
            'salle8' => '',
            'salle9' => '',
            'salle10' => '',
            'salle11' => '',
            'salle12' => '',
            'salle13' => '',
            'salle14' => '',
            'salle15' => '',
            'salle16' => '',

            'name' => 'required|string',
            'modul1' => '',
            'modul2' => '',
            'modul3' => '',
            'modul4' => '',
            'modul5' => '',
            'modul6' => '',
            'modul7' => '',
            'modul8' => '',
            'modul9' => '',
            'modul10' => '',
            'modul11' => '',
            'modul12' => '',
            'modul13' => '',
            'modul14' => '',
            'modul15' => '',
            'modul16' => '',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $planing = $this->user->planing()->create([
            'salle' => $request->salle,
            'salle2' => $request->salle2,
            'salle3' => $request->salle3,
            'salle4' => $request->salle4,
            'salle5' => $request->salle5,
            'salle6' => $request->salle6,
            'salle7' => $request->salle7,
            'salle8' => $request->salle8,
            'salle9' => $request->salle9,
            'salle10' => $request->salle10,
            'salle11' => $request->salle11,
            'salle12' => $request->salle12,
            'salle13' => $request->salle13,
            'salle14' =>  $request->salle14,
            'salle15' => $request->salle15,
            'salle16' => $request->salle16,

            'name' =>  $request->name,
            'modul1' =>  $request->modul1,
            'modul2' =>  $request->modul2,
            'modul3' =>  $request->modul3,
            'modul4' =>  $request->modul4,
            'modul5' =>  $request->modul5,
            'modul6' =>  $request->modul6,
            'modul7' =>  $request->modul7,
            'modul8' =>  $request->modul8,
            'modul9' =>  $request->modul9,
            'modul10' =>  $request->modul10,
            'modul11' =>  $request->modul11,
            'modul12' =>  $request->modul12,
            'modul13' =>  $request->modul13,
            'modul14' =>  $request->modul14,
            'modul15' =>  $request->modul15,
            'modul16' =>  $request->modul16,



           
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'planing created successfully',
            'data' => $planing
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planing  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planing = $this->user->planing()->find($id);
    
        if (!$planing) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, planing not found.'
            ], 400);
        }
    
        return $planing;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planing  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( Planing $planing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planing  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planing $planing)
    {
        //Validate data
        $data = $request->only('salle','name','modul1','modul2','modul3','modul4','modul5','modul6','modul7','modul8','modul9','modul10','modul12','modul12','modul13','modul14','modul15','modul16',
        'salle2','salle3','salle4','salle5','salle6','salle7','salle8','salle9','salle10','salle11','salle12','salle13','salle14','salle15','salle16');
        $validator = Validator::make($data, [
            
            'salle' => '',
            'salle2' => '',
            'salle3' => '',
            'salle4' => '',
            'salle5' => '',
            'salle6' => '',
            'salle7' => '',
            'salle8' => '',
            'salle9' => '',
            'salle10' => '',
            'salle11' => '',
            'salle12' => '',
            'salle13' => '',
            'salle14' => '',
            'salle15' => '',
            'salle16' => '',

            'name' => 'required|string',
            'modul1' => '',
            'modul2' => '',
            'modul3' => '',
            'modul4' => '',
            'modul5' => '',
            'modul6' => '',
            'modul7' => '',
            'modul8' => '',
            'modul9' => '',
            'modul10' => '',
            'modul11' => '',
            'modul12' => '',
            'modul13' => '',
            'modul14' => '',
            'modul15' => '',
            'modul16' => '',

           
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $planing = $planing->update([
            'salle' => $request->salle,
            'salle2' => $request->salle2,
            'salle3' => $request->salle3,
            'salle4' => $request->salle4,
            'salle5' => $request->salle5,
            'salle6' => $request->salle6,
            'salle7' => $request->salle7,
            'salle8' => $request->salle8,
            'salle9' => $request->salle9,
            'salle10' => $request->salle10,
            'salle11' => $request->salle11,
            'salle12' => $request->salle12,
            'salle13' => $request->salle13,
            'salle14' =>  $request->salle14,
            'salle15' => $request->salle15,
            'salle16' => $request->salle16,

            'name' =>  $request->name,
            'modul1' =>  $request->modul1,
            'modul2' =>  $request->modul2,
            'modul3' =>  $request->modul3,
            'modul4' =>  $request->modul4,
            'modul5' =>  $request->modul5,
            'modul6' =>  $request->modul6,
            'modul7' =>  $request->modul7,
            'modul8' =>  $request->modul8,
            'modul9' =>  $request->modul9,
            'modul10' =>  $request->modul10,
            'modul11' =>  $request->modul11,
            'modul12' =>  $request->modul12,
            'modul13' =>  $request->modul13,
            'modul14' =>  $request->modul14,
            'modul15' =>  $request->modul15,
            'modul16' =>  $request->modul16,



        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'planing updated successfully',
            'data' => $planing
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planing  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planing $planing)
    {
        $planing->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'planing deleted successfully'
        ], Response::HTTP_OK);
    }
}
 
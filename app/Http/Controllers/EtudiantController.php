<?php
namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class EtudiantController extends Controller
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
            ->etudiant()
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
        $data = $request->only('fullname', 'email','cne');
        $validator = Validator::make($data, [
            'fullname' => 'required|string',
            'email' => 'required',
            'cne' => 'required'

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $etudiant = $this->user->etudiant()->create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'cne' => $request->cne

           
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'etudiant created successfully',
            'data' => $etudiant
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = $this->user->etudiant()->find($id);
    
        if (!$etudiant) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, etudiant not found.'
            ], 400);
        }
    
        return $etudiant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //Validate data
        $data = $request->only('fullname', 'email','cne');
        $validator = Validator::make($data, [
            'fullname' => 'required|string',
            'email' => 'required',
            'cne' => 'required'

           
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $etudiant = $etudiant->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'cne' => $request->cne


        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $etudiant
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'etudiant deleted successfully'
        ], Response::HTTP_OK);
    }
}
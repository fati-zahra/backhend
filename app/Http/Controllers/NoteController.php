<?php
namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
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
            ->note()
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
        $data = $request->only('note','not2','not3','not4','not5','not6','modul1','modul2','modul3','modul4','modul5','modul6','etu');
        $validator = Validator::make($data, [
            'note' => 'required',
            'not2' => 'required',
            'not3' => 'required',
            'not4' => 'required',
            'not5' => 'required',
            'not6' => 'required',
            'modul1' => 'required',
            'modul2' => 'required',
            'modul3' => 'required',
            'modul4' => 'required',
            'modul5' => 'required',
            'modul6' => 'required',
            'etu' => 'required'


        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $note = $this->user->note()->create([
            'note' => $request->note,
            'not2' => $request->not2,
            'not3' => $request->not3,
            'not4' => $request->not4,
            'not5' => $request->not5,
            'not6' => $request->not6,
            'modul1' => $request->modul1,
            'modul2' => $request->modul2,
            'modul3' => $request->modul3,
            'modul4' => $request->modul4,
            'modul5' => $request->modul5,
            'modul6' => $request->modul6,
            'etu' => $request->etu,


           
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'note created successfully',
            'data' => $note
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = $this->user->note()->find($id);
    
        if (!$note) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, note not found.'
            ], 400);
        }
    
        return $note;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //Validate data
        $data = $request->only('note','not2','not3','not4','not5','not6','modul1','modul2','modul3','modul4','modul5','modul6','etu');
        $validator = Validator::make($data, [
            'note' => 'required',
            'not2' => 'required',
            'not3' => 'required',
            'not4' => 'required',
            'not5' => 'required',
            'not6' => 'required',

            'modul1' => 'required',
            'modul2' => 'required',
            'modul3' => 'required',
            'modul4' => 'required',
            'modul5' => 'required',
            'modul6' => 'required',
            'etu' => 'required'
           
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $note = $note->update([
            'note' => $request->note,
            'not2' => $request->not2,
            'not3' => $request->not3,
            'not4' => $request->not4,
            'not5' => $request->not5,
            'not6' => $request->not6,

            'modul1' => $request->modul1,
            'modul2' => $request->modul2,
            'modul3' => $request->modul3,
            'modul4' => $request->modul4,
            'modul5' => $request->modul5,
            'modul6' => $request->modul6,
            'etu' => $request->etu,

           
        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'note updated successfully',
            'data' => $note
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'note deleted successfully'
        ], Response::HTTP_OK);
    }
}
<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $position = Position::all();

        if ($user['role'] !== 'ADMINISTRATOR') {
            return response()->json([
                'status'    =>  [
                    'code'  =>  403,
                    'description'   =>  'Forbidden'
                ]
            ], 403);
        }

        return response()->json([
            'status'    =>  [
                'code'  =>  200,
                'description'   =>  'OK'
            ],
            'results'   =>  $position
        ], 200);
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
        $this->validate($request, [
            'code'  =>  'required|min:3|unique:positions,code',
            'name'  =>  'required',
        ]);

        $user = $request->user();

        $position = new Position;

        $position->code = strtoupper($request->code);
        $position->name = $request->name;
        $position->description = $request->description;
        $position->created_at = now();
        $position->save();

        if ($user['role'] !== 'ADMINISTRATOR') {
            return response()->json([
                'status'    =>  [
                    'code'  =>  403,
                    'description'   =>  'Forbidden'
                ]
            ], 403);
        }
        $last_insert = $position->find($position->id);
        return response()->json([
            'status'    =>  [
                'code'  =>  201,
                'description'   =>  'Created',
            ],
            'results'   =>  [
                'message'   =>  'Position created successfully.',
                'data'  =>  $last_insert
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id'    =>  'required|numeric'
        ]);

        $user = $request->user();
        if ($user['role'] !== 'ADMINISTRATOR') {
            return response()->json([
                'status'    =>  [
                    'code'  =>  403,
                    'description'   =>  'Forbidden'
                ]
            ], 403);
        }

        $position = Position::find($request->id);
        $position->delete();

        return response()->json([
            'status'    =>  [
                'code'  =>  200,
                'description'   =>  'OK',
            ],
            'results'   =>  [
                'message'   =>  'Position delete successfully.'
            ]
        ], 200);
    }
}

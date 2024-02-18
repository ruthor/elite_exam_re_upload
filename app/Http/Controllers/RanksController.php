<?php

namespace App\Http\Controllers;

use App\Models\Ranks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RanksController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = Ranks::all();

        if( $ranks->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'ranks_data' => $ranks
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Rank Found!'
            ],404);
        }
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
        $validator = Validator::make($request->all(),[
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
        }
        else
        {
            $ranks = Ranks::create([
                'code' => $request->code,
                'name' => $request->name
            ]);

            if($ranks)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Rank Created Successfully'
                ],200);
            }
            else
            {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ],500);
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ranks  $ranks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranks = Ranks::find($id);

        if($ranks)
        {
            return response()->json([
                'status' => 200,
                'ranks_data' => $ranks
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Rank Found!'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ranks  $ranks
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $ranks = Ranks::find($id);

        if($ranks)
        {
            return response()->json([
                'status' => 200,
                'ranks_data' => $ranks
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Rank Found!'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ranks  $ranks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'code' => 'required|string|max:255',
            'rank_name' => 'required|string|max:255',
            'alias' => 'required|string|max:255'

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
        }
        else
        {
            $ranks = Ranks::find($id);

            if($ranks)
            {
                $ranks->update([
                    'code' => $request->code,
                    'rank_name' => $request->rank_name,
                    'alias' => $request->alias
                ]);
    
                if($ranks)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Rank Updated Successfully'
                    ],200);
                }
                else
                {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Something went wrong'
                    ],500);
                }
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Such Rank Found!'
                ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ranks  $ranks
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $ranks = Ranks::find($id);

            if($ranks)
            {
                $ranks->delete();
    
                if($ranks)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Rank Deleted Successfully'
                    ],200);
                }
                else
                {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Something went wrong'
                    ],500);
                }
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Such Rank Found!'
                ],404);
            }
    }
}

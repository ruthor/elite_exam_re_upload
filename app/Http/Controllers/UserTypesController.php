<?php

namespace App\Http\Controllers;

use App\Models\UserTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertypes = UserTypes::all();

        if( $usertypes->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'usertypes_data' => $usertypes
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such UserType Found!'
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
            $usertypes = UserTypes::create([
                'code' => $request->code,
                'name' => $request->name
            ]);

            if($usertypes)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'UserType Created Successfully'
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
     * @param  \App\Models\UserTypes  $usertypes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usertypes = UserTypes::find($id);

        if($usertypes)
        {
            return response()->json([
                'status' => 200,
                'usertypes_data' => $usertypes
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such UserType Found!'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTypes  $usertypes
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $usertypes = UserTypes::find($id);

        if($usertypes)
        {
            return response()->json([
                'status' => 200,
                'usertypes_data' => $usertypes
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such UserType Found!'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTypes  $usertypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
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
            $usertypes = UserTypes::find($id);

            if($usertypes)
            {
                $usertypes->update([
                    'code' => $request->code,
                    'name' => $request->name
                ]);
    
                if($usertypes)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'UserType Updated Successfully'
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
                    'message' => 'No Such UserType Found!'
                ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypes  $usertypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $usertypes = UserTypes::find($id);

            if($usertypes)
            {
                $usertypes->delete();
    
                if($usertypes)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'UserType Deleted Successfully'
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
                    'message' => 'No Such UserType Found!'
                ],404);
            }
    }
}

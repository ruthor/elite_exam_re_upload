<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Documents::all();

        if( $documents->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'documents_data' => $documents
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Document Found!'
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
            $documents = Documents::create([
                'code' => $request->code,
                'name' => $request->name
            ]);

            if($documents)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Document Created Successfully'
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
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documents = Documents::find($id);

        if($documents)
        {
            return response()->json([
                'status' => 200,
                'documents_data' => $documents
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Document Found!'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $documents = Documents::find($id);

        if($documents)
        {
            return response()->json([
                'status' => 200,
                'documents_data' => $documents
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Document Found!'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documents  $documents
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
            $documents = Documents::find($id);

            if($documents)
            {
                $documents->update([
                    'code' => $request->code,
                    'name' => $request->name
                ]);
    
                if($documents)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Document Updated Successfully'
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
                    'message' => 'No Such Document Found!'
                ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $documents = Documents::find($id);

            if($documents)
            {
                $documents->delete();
    
                if($documents)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Document Deleted Successfully'
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
                    'message' => 'No Such Document Found!'
                ],404);
            }
    }
}

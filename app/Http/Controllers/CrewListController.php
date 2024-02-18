<?php

namespace App\Http\Controllers;

use App\Models\CrewList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrewListController extends Controller
{
    public function index()
    {
        $crewlist = CrewList::all();

        if( $crewlist->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'crewlist_data' => $crewlist
            ],200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Crew Found!'
            ],404);
        }
    }

    public function destroy(int $id)
    {
        $crewlist = CrewList::find($id);

            if($crewlist)
            {
                $crewlist->delete();
    
                if($crewlist)
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Crew Deleted Successfully'
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
                    'message' => 'No Such Crew Found!'
                ],404);
            }
    }
}

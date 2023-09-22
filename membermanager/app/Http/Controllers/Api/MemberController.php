<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Exception;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $schoolId = $request->query('school_id');

        try{

            $members = Member::join("schools",
            "members.school_id","schools.id")
            ->join("countries", "schools.country_id","countries.id")
            ->where('school_id', $schoolId)->get();
            if($members->count()){
               
                return response()->customJson($members, 200, "Successful");
                
            }else{
                
                return response()->customJson(null, 300, "No Result Found");
            }
        }
        catch(Exception $ex){
            return response()->customJson(null, 400, "Server Error");

        }
        
        

        // Fetch members based on the school ID
        // $members = Member::where('school_id', $schoolId)->get();

        
    }
}

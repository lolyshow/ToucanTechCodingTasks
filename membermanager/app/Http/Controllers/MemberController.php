<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use League\Csv\Writer;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::join("schools",
        "members.school_id","schools.id")
        ->join("countries", "schools.country_id","countries.id")
        ->get();
        $schools = School::all();
        return view ('members.index')
        ->with('members', $members)
        ->with('schools', $schools);
        
    }

    public function chartpage(){
        $schoolMembers = Member::join("schools",
        "members.school_id","schools.id")
        ->join("countries", "schools.country_id","countries.id")
        ->select("schools.school_name", "countries.country_name")
        ->selectRaw('COUNT(members.id) as total_members')
        ->groupBy('schools.school_name', 'countries.country_name')
        ->get();

        return view('welcome')->with("schoolMembers",$schoolMembers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_form()
    {
        $schools = School::all();
        return view('members.create')->with('schools', $schools);
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Member::create($input);
        return redirect('members')->with('flash_message', 'Member Addedd!');  
    }

    public function downloadCsv(Request $request)
    {
        $data = Member::all(); 
        // Create a CSV writer instance
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add CSV header row (column names)
        $csv->insertOne(['Name', 'Email', 'School']); 

        // Add data rows to the CSV
        foreach ($data as $row) {
            $csv->insertOne([
                $row->name, // Replace with actual column names
                $row->email,
                $row->school_name,
            ]);
        }

        // Set CSV headers for download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="report.csv"',
        ];

        // Return the CSV as a downloadable response
        return Response::make($csv->output(), 200, $headers);
    }
    
}

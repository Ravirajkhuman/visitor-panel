<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Http\Request;
use App\Http\Resources\Visitor as VisitorResource;
use App\Http\Resources\VisitorCollection;

class VisitorsController extends Controller
{
    public function __construct() {
        $this->visitors = new Visitors();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitors::all();
        return view('visitor-list',compact('visitors'));
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
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required',
            'dob'        => 'required',
        ]);

        $visitors = Visitors::create($request->all());

        return (new VisitorResource($visitors))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function show(Visitors $visitors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitors $visitors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitors $visitors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitors $visitors)
    {
        //
    }

    /**
     * collection of visitors page.
     * @param page
     * @return \Illuminate\Http\Response
     */
    public function getVisitorList()
    {
        return new VisitorCollection(Visitors::paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $visitor = Visitors::findOrFail($id);
        $visitor->delete();
        return response()->json(null, 204);
    }

    /**
     * export visitors data as csv
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function exportCsv(Request $request)
    {
       $fileName = 'visitors.csv';
       $visitors = Visitors::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('First Name', 'Last Name', 'Email', 'Date of Birth');

        $callback = function() use($visitors, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($visitors as $visitor) {
                $row['First Name']  = $visitor->first_name;
                $row['Last Name']    = $visitor->last_name;
                $row['Email']    = $visitor->email;
                $row['Date of Birth']  = $visitor->dob;

                fputcsv($file, array($row['First Name'], $row['Last Name'], $row['Email'], $row['Date of Birth']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVisitor()
    {
        return view('visitor-list-vue');
    }
}

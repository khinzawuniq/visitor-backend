<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Requests\VisitorFormRequest;

class VisitorController extends Controller
{
    private $visitor;

    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = $this->visitor->orderBy('id', 'desc')
        ->orderBy('check_out_date', 'desc')
        ->paginate(20);

        $data = [
            'visitors' => $visitors,
        ];

        return view('visitors.index', $data);
    }

    public function checkOut(Request $request)
    {
        $visitor_id = $request->id;
        $visitor = $this->visitor->find($visitor_id);
        $visitor->status = 1;
        $visitor->check_out_date = date('Y-m-d H:i:s');
        $visitor->check_out_staff = auth()->user()->id;
        $visitor->save();

        return response()->json([
            'visitor' => $visitor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisitorFormRequest $request)
    {
        $request['check_in_date'] = date('Y-m-d H:i:s');
        $input = $request->all();
        $visitor = $this->visitor->create($input);

        return response()->json($visitor, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        // $visitor = $this->visitor->find($id);

        $data = [
            'visitor' => $visitor,
        ];

        return view('visitors.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::orderby('created_at', 'DESC')->get();
        return view('sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sizes.create');
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
            'size' => 'required|unique:sizes|max:50|min:1'
        ]);

        Size::create($request->all());

        flash('Size created successfully')->success();
        return back();
        // return redirect()->route('categories.index');
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
        $size = Size::findOrFail($id);
        return view('sizes.edit', compact('size'));
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
        $request->validate([
            'size' => 'required|max:50|min:1|unique:sizes,size,' . $id
        ]);

        $sizes          = Size::findOrFail($id);

        $sizes->size    = $request->size;
        $sizes->save();

        flash('Size edit successfully')->success();
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size   = Size::findOrFail($id);

        $size->delete();

        flash('Size deleted successfully')->success();
        return redirect()->route('sizes.index');
    }

    // HANDLE AJAX REQUEST
    public function getSizesJson()
    {
        $sizes = Size::all();

        return response()->json([
            'success' => true,
            'data' => $sizes
        ], Response::HTTP_OK);
    }
}

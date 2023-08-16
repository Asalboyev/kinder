<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Approach;
use Illuminate\Http\Request;

class ApproachesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approaches = Approach::query()->get();
        return view('admin.approaches.index',compact('approaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.approaches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'taken' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
            'icon' => 'required',
        ]);
        $requestData = $request->all();


        Approach::create($requestData);
            return redirect()->route('admin.approaches.index')->with('success', 'Appoach created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Approach $approach)
    {
        return view('admin.approaches.show',compact('approach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approach $approach)
    {
        return view('admin.approaches.edit',compact('approach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Approach $approach)
    {

        $request->validate([
            'taken' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
            'icon' => 'required',
        ]);
        $requestData = $request->all();

        $approach->update($requestData);
        return redirect()->route('admin.approaches.index')->with('success', 'Appoach update succuessfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Approach::destroy($id);
        return redirect()->route('admin.approaches.index')->with('success', 'Appoach Delete succuessfuly');


    }
}

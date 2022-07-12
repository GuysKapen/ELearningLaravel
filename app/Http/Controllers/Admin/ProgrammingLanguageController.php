<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgrammingLanguage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgrammingLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = ProgrammingLanguage::latest()->get();
        return view('admin.programming_language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programming_language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $slug = Str::slug($request->name);

        $language = new ProgrammingLanguage();
        $language->name = $request->name;
        $language->slug = $slug;

        if ($language->save()) {
            Toastr::success('Save language successfully', 'Succeed');
            return redirect()->route('admin.programming-language.index');
        }
        Toastr::warning('Failed to save language', 'Failed');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgrammingLanguage  $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function show(ProgrammingLanguage $programmingLanguage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgrammingLanguage  $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrammingLanguage $programmingLanguage)
    {
        return view('admin.programming_language.edit', compact('programmingLanguage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgrammingLanguage  $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgrammingLanguage $programmingLanguage)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $slug = Str::slug($request->name);

        $programmingLanguage->name = $request->name;
        $programmingLanguage->slug = $slug;

        if ($programmingLanguage->save()) {
            Toastr::success('Save language successfully', 'Succeed');
            return redirect()->route('admin.programming-language.index');
        }
        Toastr::warning('Failed to save language', 'Failed');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgrammingLanguage  $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgrammingLanguage $programmingLanguage)
    {
        if ($programmingLanguage->delete()) {
            Toastr::success('Delete language successfully', 'Succeed');
            return redirect()->back();
        }

        Toastr::error('Failed to delete language', 'Failed');
        return redirect()->back();
    }
}

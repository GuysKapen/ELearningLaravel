<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::latest()->get();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:languages',
        ]);

        $slug = Str::slug($request->name);

        $language = new Language();
        $language->name = $request->name;
        $language->slug = $slug;

        if ($language->save()) {
            Toastr::success('Save language successfully', 'Succeed');
            return redirect()->route('admin.language.index');
        }
        Toastr::warning('Failed to save language', 'Failed');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Language $language)
    {
        $this->validate($request, [
            'name' => 'required|unique:languages',
        ]);

        $slug = Str::slug($request->name);

        $language->name = $request->name;
        $language->slug = $slug;

        if ($language->save()) {
            Toastr::success('Save language successfully', 'Succeed');
            return redirect()->route('admin.language.index');
        }
        Toastr::warning('Failed to save language', 'Failed');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Language $language)
    {
        if ($language->delete()) {
            Toastr::success('Delete language successfully', 'Succeed');
            return redirect()->back();
        }

        Toastr::error('Failed to delete language', 'Failed');
        return redirect()->back();
    }
}

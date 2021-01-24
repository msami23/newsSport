<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LanguagesController extends Controller
{
    public function index()
    {
        $languages = language::select()->paginate(PAGINATION_COUNT);
        return view('adminPanel.languages.index', compact('languages'));
    }

    public function create()
    {

        return view('adminPanel.languages.create');
    }

    public function store(LanguageRequest $request)
    {
        try {

            Language::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success' => 'Save Successful!']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'Something went wrong please try again later']);
        }
    }


    public function edit($id)
    {
        $language = Language::select()->find($id);
        if (!$language) {
            return redirect()->route('admin.languages')->with(['error' => 'This language does not exist']);
        }

        return view('adminPanel.languages.edit', compact('language'));
    }



    public function update($id, LanguageRequest $request)
    {

        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.languages.edit', $id)->with(['error' => 'This language does not exist']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $language->update($request->except('_token'));

            return redirect()->route('admin.languages')->with(['success' => 'Update Successful!']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'Something went wrong please try again later']);
        }
    }

    public function destroy($id)
    {

        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('admin.languages', $id)->with(['error' => 'This language does not exist']);
            }
            $language->delete();

            return redirect()->route('admin.languages')->with(['success' => 'Delete Successful!']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'Something went wrong please try again later']);
        }
    }
}

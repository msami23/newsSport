<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::select()->get();
        return view('adminPanel.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('adminPanel.categories.create');

    }
    public function store(CategoriesRequest $request)
    {
        try {

            Category::create($request->except(['_token']));
            return redirect()->route('front.categories')->with(['success' => 'Save Successful!']);
        } catch (\Exception $ex) {
            return redirect()->route('front.categories')->with(['error' => 'Something went wrong please try again later']);
        }
    }
    public function edit($id)
    {
        $categories = Category::select()->find($id);
        if (!$categories) {
            return redirect()->route('front.categories')->with(['error' => 'This language does not exist']);
        }

        return view('adminPanel.categories.edit', compact('categories'));
    }

    public function update($id, CategoriesRequest $request)
    {

        try {
            $categories = Category::find($id);
            if (!$categories) {
                return redirect()->route('front.categories.edit', $id)->with(['error' => 'This language does not exist']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $categories->update($request->except('_token'));

            return redirect()->route('front.categories')->with(['success' => 'Update Successful!']);

        } catch (\Exception $ex) {
            return redirect()->route('front.categories')->with(['error' => 'Something went wrong please try again later']);
        }
    }

    public function delete($id)
    {

        try {
            $categories = Category::find($id);
            if (!$categories) {
                return redirect()->route('front.categories', $id)->with(['error' => 'This language does not exist']);
            }
            $categories->delete();

            return redirect()->route('front.categories')->with(['success' => 'Delete Successful!']);

        } catch (\Exception $ex) {

            return redirect()->route('front.categories')->with(['error' => 'Something went wrong please try again later']);
        }
    }


}


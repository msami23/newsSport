<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::selection()->paginate(PAGINATION_COUNT);
        return view('adminPanel.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('adminPanel.news.create', compact('categories'));

    }

    public function store(NewsRequest $request)
    {

        try {

            $filePath = "";
            if ($request->has('image')) {
                $filePath = uploadImage('news', $request->image);
            }


           News::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filePath,
                'topic' => $request->topic,
                'category_id' => $request->category_id,
                //  'user_id'=>$request->user_id,
            ]);

            return redirect()->route('front.news')->with(['success' => 'Save Successful!']);
        } catch (\Exception $ex) {


            return redirect()->route('front.news')->with(['error' => 'Something went wrong please try again later']);
        }
    }


    public function edit($id)
    {
        try {
            $publisher = News::Selection()->find($id);
            if (!$publisher)
                return redirect()->route('front.news')->with(['error' => 'This language does not exist']);
            $categories = Category::get();
            return view('adminPanel.news.edit',compact('publisher','categories'));

        }catch (\Exception $ex){


        }

        return redirect()->route('front.news')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }


    public function update($id, NewsRequest $request)
    {


        try {
            $publisher = News::Selection()->find($id);
            if (!$publisher) {
                return redirect()->route('front.news')->with(['error' => 'Something went wrong please try again later']);
                DB::beginTransaction();
              //  return redirect()->route('front.news.edit', $id)->with(['error' => 'This language does not exist']);
            }

            if ($request->has('image')) {
                $filePath = uploadImage('news', $request->image);
                News::where('id', $id)
                    ->update([
                        'image' => $filePath,
                    ]);
            }
           $data = $request->except('_token', 'id');
         News::where('id', $id)->update($data);
            DB::commit();



            return redirect()->route('front.news')->with(['success' => 'Update Successful!']);

        } catch (\Exception $ex) {

            return redirect()->route('front.news')->with(['error' => 'Something went wrong please try again later']);
        }
    }

    public function delete($id)
    {

        try {
            $news = News::find($id);
            if (!$news) {
                return redirect()->route('front.news', $id)->with(['error' => 'This language does not exist']);
            }
            $news->delete();

            return redirect()->route('front.news')->with(['success' => 'Delete Successful!']);

        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->route('front.news')->with(['error' => 'Something went wrong please try again later']);
        }
    }


}

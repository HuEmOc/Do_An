<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::paginate(5);
        return view('backend.categories.index')->with(['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesList = $this->categorySelectBox();
        return view('backend.categories.create', compact('categoriesList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only([
            'name', 'alias','parent_id','keywords','description',
        ]);
        Category::create($input);
        return redirect()->route('categories.index')
            ->with('success', 'categories create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
        return view('backend.categories.show')->with(['categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Category::find($id);
        $categoriesList = $this->categorySelectBox($item->parent_id);
        return view('backend.categories.edit')->with(['item'=>$item, 'categoriesList'=>$categoriesList]);
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
        $item = Category::find($id);
        $item->name = $request->name;
        $item->alias = $request->alias;
        $item->order = $request->order;
        $item->parent_id = $request->parent_id;
        $item->keywords = $request->keywords;
        //dd($item->keywords);
        $item->description = $request->description;
        $item->save();
        return redirect()->route('categories.index')
            ->with('success', 'categories create successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::find($id);
        $item->delete();
        return redirect()->route('categories.index')->with('success','Categories remove successfully');
    }

    public function categorySelectBox ($id_selected = null) {
        $categories = Category::where('parent_id', 0)->get();
        $categoriesHtml = '<option value="0">No Parent</option>';
        foreach ($categories as $category) {
            $selected = ($id_selected === $category->id) ? 'selected' : '';
            $categoriesHtml .= '<option value="'.$category->id.'" '. $selected .'>' . $category->name . '</option>';
            foreach ($category->child as $child) {
                $selected = ($id_selected === $child->id) ? 'selected' : '';
                $categoriesHtml .= '<option value="'.$child->id.'" '. $selected .'>|— ' . $child->name . '</option>';
            }
        }
        return $categoriesHtml;
    }
}

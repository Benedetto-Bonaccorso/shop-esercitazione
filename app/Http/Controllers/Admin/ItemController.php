<?php
//esempio          +++commento
//iuwanxmfouwegweuoihfxifu gchenj
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request, Item $item)
    {
        $val_data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $img_path = Storage::put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $img_path;
        }

        $slug_title = Str::slug($val_data['title']);
        $val_data['slug'] = $slug_title;

        $item = Item::create($val_data);

        if ($request->has('categories')) {
            $item->categories()->attach($val_data['categories']);
        }

        return to_route("admin.items.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $val_data = $request->validated();
        // dd($val_data);

        if ($request->hasFile('cover_image')) {
            if ($item->cover_image) {
                Storage::delete($item->cover_image);
            }
            $img_path = Storage::put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $img_path;
        }

        $slug_title = Str::slug($val_data['title']);
        $val_data['slug'] = $slug_title;

        $item->update($val_data);

        if ($request->has('categories')) {
            $item->categories()->sync($val_data['categories']);
        } else {
            $item->categories()->sync([]);
        }

        return to_route("admin.items.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if ($item->cover_image) {
            Storage::delete($item->cover_image);
        }
        $item->delete();
        return to_route("admin.items.index");
    }
}

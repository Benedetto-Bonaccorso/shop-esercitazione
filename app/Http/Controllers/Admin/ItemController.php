<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Item;
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
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {

        $newItem = new Item();
        $newItem->title = $request["title"];
        $newItem->slug = Str::slug($request["title"]);
        $newItem->body = $request["body"];
        if ($request->hasFile('cover_image')) {


            // $img_path = Storage::disk('public')->put('uploads', $request->cover_image);
            $img_path = Storage::put('uploads', $request->cover_image);
            // $img_path = Storage::disk('public')->put('uploads', $request->cover_image);
            // dd($request->all());

            $newItem->cover_image = $img_path;
        }
        $newItem->save();

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
        return view('admin.items.edit', compact('item'));
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
        $item->title = $request["title"];
        $item->body = $request["body"];
        // dd($request->all());
        if ($request->hasFile('cover_image')) {
            if ($item->cover_image) {
                Storage::delete($item->cover_image);
            }
            // $img_path = Storage::disk('public')->put('uploads', $request->cover_image);
            $img_path = Storage::put('uploads', $request->cover_image);
            // $img_path = Storage::disk('public')->put('uploads', $request->cover_image);
            // dd($request->all());

            $item->cover_image = $img_path;
        }
        $item->save();
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

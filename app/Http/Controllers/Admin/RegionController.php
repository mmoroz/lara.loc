<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage-regions');
    }

    public function index()
    {
        $regions = Region::where('parent_id', null)->orderBy('name')->paginate(10);

        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parent = null;

        if ($request->get('parent')) {
            $parent = Region::findOrFail($request->get('parent'));
        }

        return view('admin.regions.create', compact('parent'));
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
            'name' => 'required|string|max:255|unique:regions,name,NULL,id,parent_id,' . ($request['parent'] ?: 'NULL'),
            'slug' => 'required|string|max:255|unique:regions,slug,NULL,id,parent_id,' . ($request['parent'] ?: 'NULL'),
            'parent' => 'exists:regions,id',
        ]);

        $region = Region::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.regions.show', $region);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        $regions = Region::where('parent_id', $region->id)->orderBy('name')->get();

        return view('admin.regions.show', compact('region', 'regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:regions,name,' . $region->id . ',id,parent_id,' . $region->parent_id,
            'slug' => 'required|string|max:255|unique:regions,slug,' . $region->id . ',id,parent_id,' . $region->parent_id,
        ]);

        $region->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.regions.show', $region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('admin.regions.index');
    }
}

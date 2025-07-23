<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Youtube::latest()
            ->when($request->search, function ($query) use ($request) {
                $query->where('youtube', 'like', '%' . $request->search . '%');
            })
            ->simplePaginate(20);

        if ($request->ajax()) {
            return view('admin.article.row', compact('data'))->render();
        }

        return view('admin.youtube.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $newdata = new Youtube;

        $newdata->youtube = $request->link;

        $newdata->save();;

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Youtube $youtube)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Youtube $youtube)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Youtube $youtube)
    {
        $youtube->youtube = $request->link;

        $youtube->save();;

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Youtube $youtube)
    {
        $youtube->delete();

        return redirect()->back();
    }
}

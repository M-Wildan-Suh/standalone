<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\ArticleShow;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PhoneNumber::all();
        return view('admin.phone-number.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = ArticleCategory::whereNull('phone_number_id')->get();
        return view('admin.phone-number.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'no_tlp' => 'required|max:255|unique:'.PhoneNumber::class,
            'category' => 'array',
            'article' => 'array',
        ]);

        $newtlp = new PhoneNumber;

        $newtlp->no_tlp = preg_replace('/^0/', '+62', $request->no_tlp);

        $newtlp->save();

        if ($request->category) {
            foreach ($request->category as $item) {
                $category = ArticleCategory::find($item);
                $category->phone_number_id = $newtlp->id;
                $category->save();
            }
        }

        return redirect()->route('phone-number.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhoneNumber $phoneNumber)
    {
        $first = PhoneNumber::first()->id;
        $category = ArticleCategory::all();
        $phoneNumber->type = ($phoneNumber->id === $first ? 'main' : 'notmain');
        return view('admin.phone-number.edit', compact('phoneNumber', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhoneNumber $phoneNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhoneNumber $phoneNumber)
    {
        $validated = $request->validate([
            'no_tlp' => 'required|max:255|unique:'.PhoneNumber::class,
            'category' => 'array',
            'article' => 'array',
        ]);
        
        $phoneNumber->no_tlp = preg_replace('/^0/', '+62', $request->no_tlp);

        $phoneNumber->save();

        ArticleCategory::where('phone_number_id', $phoneNumber->id)->update(['phone_number_id' => null]);

        if ($request->category) {
            foreach ($request->category as $item) {
                $category = ArticleCategory::find($item);
                $category->phone_number_id = $phoneNumber->id;
                $category->save();
            }
        }

        return redirect()->route('phone-number.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneNumber $phoneNumber)
    {
        ArticleShow::where('phone_number_id', $phoneNumber->id)->update(['phone_number_id' => null]);
        ArticleCategory::where('phone_number_id', $phoneNumber->id)->update(['phone_number_id' => null]);

        // dd($phoneNumber);
        $phoneNumber->delete();
        return redirect()->back();
    }
}

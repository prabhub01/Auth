<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'review' => 'required',
            'image' => 'required',  //|image|mimes:jpeg,png,jpg,gif,svg|max:5120
           'date' => 'required',
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            // $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
            $path = $request->image->move(public_path('uploads'), $imageName);
          }

          $testimonial = new Testimonial;

          $testimonial->name = $request->name;
          $testimonial->review = $request->review;
          $testimonial->date = $request->date;

          $testimonial->image = $imageName;
          $testimonial->path = $path;
          $testimonial->save();


        return redirect()->route('role')
                        ->with('success','New Testimonial Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Jhantu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
class JhantuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Jhantu::orderBy('created_at','desc')->paginate(8);
        return view('jhantu.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('jhantu.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =['description' => 'required',];
        $this->validate($request,$rules);
        $imageObj = new Jhantu();

            if($request->hasFile('image')) {
                $dir = 'images/';
                $extension = strtolower($request->file('image')->extension());
                $filename =  Carbon::now() . '.' . $extension;
                // dd($filename);
                $request->file('image')->move($dir,$filename);
                $imageObj->image = $filename; 
            }
        $imageObj->description = $request->description;
        $imageObj->save();
        return redirect()->route('jhantu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jhantu  $jhantu
     * @return \Illuminate\Http\Response
     */
    public function show(Jhantu $jhantu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jhantu  $jhantu
     * @return \Illuminate\Http\Response
     */
    public function edit(Jhantu $jhantu)
    {
        return view('jhantu.form')->with('image', $jhantu);;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jhantu  $jhantu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jhantu $jhantu)
    {
        $rules = [
            'description' => 'required',
        ];
        $this->validate($request, $rules);
        $imageObj = $jhantu;
        if($request->hasFile('image')) {
            $dir = 'images/';
            if($imageObj->image !='' && File::exists($dir . $imageObj->image)){
                File::delete($dir . $imageObj->image);
            }
            // $extension = strtolower($request->file('image')->getOriginalExtension());
            $extension = strtolower(File::extension($request->file('image')));
            $filename =  Carbon::now().'.'.$extension;
            $request->file('image')->move($dir,$filename);
            $imageObj->image = $filename; 
        }elseif($request->remove == 1 && File::exists('images/'.$imageObj->image)){
            File::delete()('images/'.$imageObj->post_image);
            $imageObj->image = null;
        }
        $imageObj->description = $request->description;
        $imageObj->save();
        return redirect()->route('jhantu.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jhantu  $jhantu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jhantu $jhantu)
    {
        $jhantu->delete();
        return redirect()->route('jhantu.index');

    }
}

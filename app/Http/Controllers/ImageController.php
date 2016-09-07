<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = Image::orderBy('id')->paginate(5);
        return view('images.index',compact('images'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
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
            'name' => 'required|mimes:jpg,jpeg,png|Max:1000'
        ]);
        $destination = public_path('/uploads');
        $image = $request->file('name');
        $image_name = time().'.'.$image->getClientOriginalName();
        $image->move($destination, $image_name);

        Image::create(
            array('name' => $image_name )
        );

        return redirect()->route('images.index')
                        ->with('success','Image created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        return view('images.show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('images.edit',compact('image'));
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
        $this->validate($request, [
            'name' => 'required|mimes:jpg,jpeg,png|Max:1000'
        ]);
        $destination = public_path('/uploads');
        $image = $request->file('name');
        $image_name = time().'.'.$image->getClientOriginalName() ;
        $image->move($destination, $image_name);

        Image::find($id)->update(
            array('name' => $image_name )
        );

        return redirect()->route('images.index')
                        ->with('success','Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::find($id)->delete();
        return redirect()->route('images.index')
                        ->with('success','Image deleted successfully');
    }
}

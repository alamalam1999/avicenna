<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }


    /**
* create
*
* @return void
*/
public function create()
{
    return view('blog.create');
}


/**
* store
*
* @param  mixed $request
* @return void
*/
public function store(Request $request)
{

    $this->validate($request, [
        'image'         => 'required|image|mimes:png,jpg,jpeg',
        'name'          => 'required',
        'gender'        => 'required',
        'nis'           => 'required',
        'tempatlahir'   => 'required',
        'tanggallahir'  => 'required',
        'religion'      => 'required',
        'school'        => 'required',
        'class'         => 'required',
    ]);

    //upload image
    $image = $request->file('image');
    $image->storeAs('public/blogs', $image->hashName());

    $blog = Blog::create([
        'image'         => $image->hashName(),
        'name'          => $request->name,
        'gender'        => $request->gender,
        'nis'           => $request->nis,
        'tempatlahir'   => $request->tempatlahir,
        'tanggallahir'  => $request->tanggallahir,
        'religion'      => $request->religion,
        'school'        => $request->school,
        'class'         => $request->class
    ]);

    if($blog){
        //redirect dengan pesan sukses
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

/**
* edit
*
* @param  mixed $blog
* @return void
*/
public function edit(Blog $blog)
{
    return view('blog.edit', compact('blog'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function update(Request $request, Blog $blog)
{


    $this->validate($request, [
        'name'          => 'required',
        'gender'        => 'required',
        'nis'           => 'required',
        'tempatlahir'   => 'required',
        'tanggallahir'  => 'required',
        'religion'      => 'required',
        'school'        => 'required',
        'class'         => 'required'
    ]);

    //get data Blog by ID
    $blog = Blog::findOrFail($blog->id);

    if($request->file('image') == "") {

        $blog->update([
            'name'          => $request->name,
            'gender'        => $request->gender,
            'nis'           => $request->nis, 
            'tempatlahir'   => $request->tempatlahir,
            'tanggallahir'  => $request->tanggallahir,
            'religion'      => $request->religion,
            'school'        => $request->school,
            'class'         => $request->class
        ]);

    } else {

        //hapus old image
        Storage::disk('local')->delete('public/blogs/'.$blog->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/blogs', $image->hashName());

        $blog->update([
            'image'         => $image->hashName(),
            'name'          => $request->name,
            'gender'        => $request->gender,
            'nis'           => $request->nis,
            'tempatlahir'   => $request->tempatlahir,
            'tanggallahir'  => $request->tanggallahir,
            'religion'      => $request->religion,
            'school'        => $request->school,
            'class'         => $request->class
        ]);

    }

    if($blog){
        //redirect dengan pesan sukses
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

/**
* destroy
*
* @param  mixed $id
* @return void
*/
public function destroy($id)
{
  $blog = Blog::findOrFail($id);
  Storage::disk('local')->delete('public/blogs/'.$blog->image);
  $blog->delete();

  if($blog){
     //redirect dengan pesan sukses
     return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('blog.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}




}

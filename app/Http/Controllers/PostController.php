<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request)
    {
        $search = $request->search;
        $postQuery = Post::with('kategori');

        if ($search != '') {
            $postQuery->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhereHas('kategori', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        }

        $post = $postQuery->latest()->paginate(7);
        $kategori = Kategori::all();

        return view('post.index', compact('post', 'kategori'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::all();
        $kategori = Kategori::all();
        return view('post.create', compact('post', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'slug' => 'required',
            'title' => 'nullable',
            'body' => 'nullable',
            'kategori_id' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('berita'), $imageName);

        Post::create([
            // 'slug' => $request->slug,
            'title' => $request->title,
            'body' => $request->body,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status,
            'image' => $imageName
        ]);

        return redirect()->route('post.index')->with('success', 'Data Berhasil Ditambahkan');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            // 'slug' => 'required|unique:posts',
            'title' => 'nullable',
            'body' => 'nullable',
            'kategori_id' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('berita'), $imageName);
            $post->image = $imageName;
        }

        $post->update([
            // 'slug' => $request->slug,
            'title' => $request->title,
            'body' => $request->body,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status,

        ]);

        return redirect()->route('post.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);
        $kategori = Kategori::where('id', $post->kategori_id)->first();

        return response()->json([
            'post' => $post,
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $kategori = Kategori::all();
        return view('post.edit', compact('post', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Data Berhasil Dihapus');
    }
}

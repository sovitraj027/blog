<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::latest()->get(),
            'categories'=>Category::where('status','1')->get()
        ]);
    }

    public function create()
    {
        if (Category::count() < 0 && Tag::count() < 0) {
            return redirect()->back()->with('error', 'There is empty category or tag please add them first');
        }

        return view('admin.post.create', [
            'categories' => Category::where('status', '1')->get(),
            'tags' => Tag::where('status', '1')->get(),

        ]);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->except('_token', 'image', 'tag_id'));

        if ($request->hasFile('image')) {

            $this->fileUpload($post, 'image', 'post-image', false);
        }
        $post->tags()->attach($request->tag_id);

        return redirect()->route('posts.index')->with('success', 'posts Created Successfully!');
    }

    public function edit(Post $post)
    {
      
        $tag_ids = DB::table('post_tag')->where('post_id', $post->id)->pluck('tag_id')->toArray();
      
        return view('admin.post.edit', [
            'categories' => Category::where('status', '1')->get(),
            'tags' => Tag::where('status', '1')->get(),
            'post' => $post,
            'tag_ids' => $tag_ids,
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $post->update($request->except('_token', 'image', 'tag_id'));

        if ($request->hasFile('image')) {
            if (!is_null($post->image)) {

                $this->fileUpload($post, 'image', 'post-image', true);
            }
            $this->fileUpload($post, 'image', 'post-image', false);
        }

        $post->tags()->sync($request->tag_id);

        return redirect()->route('posts.index')->with('info', 'posts Updated Successfully!');
    }



    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('public/post-image/' . $post->image);
        }
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('error', 'Posts Deleted Successfully!');
    }

    public function changestatus(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->status = $request->status;
        $post->save();
        return response()->json(['success' => 'Status change successfully.']);
    }


    public function filterPost(Request $request){

        $category=Category::where('id',$request->category_id)->first();
        
         return view('admin.post.index', [
         'posts' => $category->posts,
         'categories'=>Category::where('status','1')->get()
      ]);;
      ;


    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(3);
        return view('backend.blog.index', compact('blogs'));
    }
    public function create()
    {
        return view('backend.blog.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title'    => 'required|max:200',
            'content'  => 'required',
        ]);

        $filenamewithextension = $request->image->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenametostore = $request->file('image')->storeAs('', $filename.'.'.$extension);
        $blog = new Blog();
        $blog->date = Carbon::today();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = $filenametostore;
        $blog->save();
        return redirect(route('admin.blog'))->with('successMessage', 'Blog Added successfully.');
    }
    public function edit(Request $request, $id)
    {
        $blog = Blog::find($id);
        return view('backend.blog.edit', compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title'    => 'required|max:200',
            'content'  => 'required'
        ]);
        if ($request->has('image')) {
            $filenamewithextension = $request->image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $request->file('image')->storeAs('', $filename.'.'.$extension);
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->image = $filenametostore;
            $blog->save();
        } else {
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->save();
        }
        return redirect(route('admin.blog'))->with('successMessage', 'Blog Updated successfully.');
    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect(route('admin.blog'))->with('successMessage', 'Blog Deleted successfully.');
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}

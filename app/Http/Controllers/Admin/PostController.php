<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

// ყველაფრი მიტყეპებული რატოა?? :დდდდ 
// სად არის შინაგან სამინისტრო? :დდდდ
// წერის სტილი და კულტურა უნდა დაიცვა 
// კოდის გარჩევა რომ გაგიადვილდეს, უნდა დაიცვა სტანდარტი და წესები

class PostController extends Controller
{
public function index()
{
$posts = Post::latest()->get();
return view('admin.post.index', compact('posts'));
}

public function create()
{
return view('admin.post.create');
}

public function store(Request $request)
{
$data = $request->validate([
'title' => 'required',
'content' => 'required',
'image' => 'nullable|image'
]);

if ($request->hasFile('image')) {
$data['image'] = $request->file('image')->store('posts', 'public');
}

Post::create($data);

return redirect()->route('admin.posts.index');
}

public function edit(Post $post)
{
return view('admin.post.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
$data = $request->validate([
'title' => 'required',
'content' => 'required',
'image' => 'nullable|image'
]);

if ($request->hasFile('image')) {
$data['image'] = $request->file('image')->store('posts', 'public');
}

$post->update($data);

return redirect()->route('admin.posts.index');
}

public function destroy(Post $post)
{
$post->delete();
return back();
}
}

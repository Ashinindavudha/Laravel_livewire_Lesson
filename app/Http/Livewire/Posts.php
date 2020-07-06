<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;
class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $updateMode = false;
    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }

    private function resetInputFields() {
    	$this->title = '';
    	$this->body = '';
    }

    public function store() 
    {
    	$validateData = $this->validate([
    		'title' => 'required',
    		'body' => 'required',
    	]);

    	Post::create($validateData);
    	session()->flash('message', 'Post Created Successfully');
    	$this->resetInputFields();
    }

    public function edit($id)
    {
    	$post = Post::findOrFail($id);
    	$this->post_id = $id;
    	$this->title = $post->title;
    	$this->body = $post->body;

    	$this->updateMode = true;
    }

    public function cancel()
    {
    	$this->updateMode = false;
    	$this->resetInputFields();
    }

    public function update()
    {
    	$validateDate = $this->validate([
    		'title' => 'required',
    		'body' => 'required',
    	]);

    	$post = Post::find($this->post_id);
    	$post->update([
    		'title' => $this->title,
    		'body' => $this->body,
    	]);

    	$this->updateMode = false;
    	session()->flash('message', 'Post Updated Successfully.');
    }

    public function delete($id)
    {
    	Post::find($id)->delete();
    	session()->flash('message', 'Post Deleted Successfully.');
    }
}

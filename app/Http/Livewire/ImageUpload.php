<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Photo;

class ImageUpload extends Component
{
    
	use WithFileUploads;

	public $photo;
	public function save()
	{
		$this->validate([
			'photo' => 'image|max:1024',
		]);
		$name = md5($this->photo . microtime()).'.'.$this->photo->extension();
		$this->photo->storeAs('photos', $name);
		Photo::create(['file_name' => $name]);
		session()->flash('message', 'The Photo is successfully Uploaded');
	}
	

    public function render()
    {
        return view('livewire.image-upload', ['photos' => Photo::all(), ]);
    }
}

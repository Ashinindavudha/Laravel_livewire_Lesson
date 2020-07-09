<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class FileUploader extends Component
{
    use WithFileUploads;

    public $photos = [];

    /* 
	public function updatedPhoto()
	{
	this->validate([
	'photo' => 'image|max:10240'/ // 1MB Max
	]);
	}
    */
    
	public function save()
	{
		$this->validate([
			'photos.*' => 'image|max:10240', // 1MB
		]);

		foreach ($this->photos as $photo) {
			$photo->storePublicly('photos', 's3');
		}
		$this->photos = [];
		session()->flash('message', 'FileUploaded !');
	}

	public function remove($index)
	{
		array_slice($this->photos, $index, 1);

	}

    public function render()
    {
        return view('livewire.file-uploader');
    }
}

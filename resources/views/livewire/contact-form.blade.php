<form action="" wire:submit.prevent="submit">
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" wire:model="name">
		@error('name') <span class="text-danger">{{ $message }}</span>@enderror
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control" wire:model="email">@error('email') <span class="text-danger">{{ $message }}</span>@enderror
	</div>
	<div class="form-group">
		<label for="body">Description</label>
		<textarea name="body" id="body" cols="30" rows="10" placeholder="Enter Your Description" class="form-control" wire:model="body"></textarea>
		@error('body') <span class="text-danger">{{ $message }}</span>@enderror
	</div>

	<button type="submit" class="btn btn-success">Save Contact</button>
</form>

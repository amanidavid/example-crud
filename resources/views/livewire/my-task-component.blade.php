


<form class="row g-3" wire:submit="import">
    <div class="mb-3">
        <label for="formFile" class="form-label">import excel file</label>
        <input class="form-control" type="file" id="formFile" wire:model="file">
        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-success">Import</button>
  </form>

  @if (session()->has('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

@if (session()->has('error'))
<div class="alert alert-success">{{ session('error') }}</div>
@endif
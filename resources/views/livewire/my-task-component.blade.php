<form class="row g-3" wire:submit="import"  enctype="multipart/form-data">
 
  <div class="mb-3">
      <label for="formFile" class="form-label">Choose Excel File</label>
      <input class="form-control" type="file" id="formFile" wire:model="file" accept=".xlsx,.xls,.csv">
      @error('file') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @if ($file)
    <div class="mb-3">
        <strong>Selected File:</strong> {{ $file->getClientOriginalName() }}
    </div>
  @endif

 <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
    <span wire:loading.remove>import</span>
    <span wire:loading>Uploading...</span>
</button> 
    <div wire:loading wire:target="file">Uploading...</div>
   {{-- <button type="submit" class="btn btn-success">Import</button>  --}}
</form>
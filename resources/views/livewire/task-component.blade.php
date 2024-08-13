
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if (session()->has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        {{ session('error') }}

    </div>
@endif

@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    {{ session('message') }}

</div>
@endif
<form wire:submit.prevent="save">
    @csrf
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Task Name</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" wire:model.blur="task_name" required/>
                @error('task_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="button-style-four btn-mg-b-10">
            <button type="button" data-dismiss="modal" class="btn btn-custon-four btn-danger">Cancel</button>
            <button type="submit" class="btn btn-custon-four btn-primary" >Save</button>
          
        </div>
  </div>
</form>
</div>

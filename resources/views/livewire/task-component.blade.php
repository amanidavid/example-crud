
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

{{-- @if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    {{ session('message') }}

</div>
@endif --}}
<form wire:submit="save">
   
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Title</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" wire:model="task_name" required/>
                @error('task_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Start Date</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="date" class="form-control" wire:model="start_date" required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
                @error('start_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Due Date</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="date" class="form-control" wire:model="due_date" required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
                @error('due_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Description</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" wire:model="description" rows="4" placeholder="Enter description here" ></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group-inner">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label class="login2 pull-right pull-right-pro">Assigned To</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <select  name="assignees[]" id="assignees" class="chosen-select  form-control" wire:model="assignees" multiple="multiple"  style="width: 100%;" required>
                    @forelse($output as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @empty
                        <option disabled>No users available</option>
                    @endforelse
                </select>
                @error('assignees') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    
 
    
    
    
    

    <div class="modal-footer">
        <div class="button-style-four btn-mg-b-10">
            <button type="button" data-dismiss="modal" onclick="" class="btn btn-custon-four btn-danger">Cancel</button>
            <button type="submit" class="btn btn-custon-four btn-primary" >Save</button>
          
        </div>
  </div>
</form>
</div>

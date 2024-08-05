<div>
    {{-- The whole world belongs to you. --}}
    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
    <thead>
        <tr>
            {{-- <th data-field="state" data-checkbox="false"></th> --}}
            <th data-field="id">No</th>
            <th data-field="task_name">Task Name</th>
            <th data-field="status">Status</th>
            <th data-field="">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($task as $index => $task)
        <tr>
            <td>{{$index + 1}}</td>
            <td>{{$task->task_name}}</td>
            <td>{{ $task->complete ? 'Completed' : 'Pending' }}</td>
            <td>   
             @if (!$task->complete)
                <button type="button" wire:click="markAsRead({{ $task->id }})" class="btn btn-custon-four btn-primary">Mark as Read</button>
            @endif
                <button type="button" data-toggle="modal" data-target="#PrimaryModalhdbgcl" wire:click="edit({{ $task->id }})" class="btn btn-custon-four btn-warning">Edit</button>
                <button type="button"  wire:click="delete({{$task->id}})"class="btn btn-custon-four btn-danger">Delete</button>
                {{-- <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalalert">Add Task</a> --}}

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if($editTaskId)
@if (session()->has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    {{ session('error') }}
@endif
<div class="edit-form">
    <h3>Edit Task</h3>
    </div>
    <form wire:submit.prevent="update">
        <input type="text" wire:model="editTaskName" class="form-control" />
        @error('editTaskName') <span class="error">{{ $message }}</span> @enderror
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" wire:click="$set('editTaskId', null)" class="btn btn-secondary">Cancel</button>
    </form>
</div>
@endif
</div>

</div>




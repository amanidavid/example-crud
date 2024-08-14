
    {{-- <div wire:poll.2s> --}}
    <tbody >
        @foreach ($task as $index => $task)
        <tr   wire:key ="{{ $task->id }}" >
            <td>{{$index + 1}}</td>
            <td>{{$task->task_name}}</td>
            <td>{{ $task->description  }}</td>
            <td>{{ $task->start_date  }}</td>
            <td>{{ $task->due_date  }}</td>
            <td>{{ $task->status  }}</td>
            <td>   
             @if (!$task->complete)
                <button type="button" wire:click="markAsRead({{ $task->id }})" class="btn btn-custon-four btn-primary">Mark as Read</button>
            @endif
                <button type="button" data-toggle="modal" data-target="#PrimaryModalhdbgcl" wire:click="edit({{ $task->id }})" class="btn btn-custon-four btn-warning">Edit</button>
                <button type="button"  wire:click="delete({{$task->id}})"class="btn btn-custon-four btn-danger"  wire:confirm="Are you sure you want to delete this task?">Delete</button>
                {{-- <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalalert">Add Task</a> --}}

            </td>
        </tr>
        @endforeach
    </tbody>
{{-- </div> --}}



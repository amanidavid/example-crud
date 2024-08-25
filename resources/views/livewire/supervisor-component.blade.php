<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <tbody >
        @foreach ($mytask as $index => $task)
            <tr   wire:key ="{{ $task->id }}" >
                <td>{{$index + 1}}</td>
                <td>{{$task->task_name}}</td>
                <td>{{ $task->description  }}</td>
                <td>{{ $task->start_date  }}</td>
                <td>{{ $task->due_date  }}</td>
                <td>{{ $task->status  }}</td>
                <td>{{ $task->assignee  }}</td>
                {{-- <td> --}}
                {{-- <button  
                    class="btn btn-custon-four btn-primary" wire:model="loadTask({{ $task->id }})" data-toggle="modal" data-target="#InformationproModalalert" >Edit
                </button>  --}}
                {{-- <button type="submit" wire:click="delete({{ $task->id }})" class="btn btn-custon-four btn-success"  wire:offline.class="disabled" >Confirm</button> --}}
  {{-- </td> --}}
                
            </tr>
        @endforeach
        
    </tbody>
</div>

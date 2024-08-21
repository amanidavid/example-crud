
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
            <td>{{ $task->assignee  }}</td>
           
        </tr>
        @endforeach
    </tbody>
{{-- </div> --}}



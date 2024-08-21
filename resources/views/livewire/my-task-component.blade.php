
{{-- <tbody>
@foreach ($result as $index => $task)
<tr    >
    <td>{{$index + 1}}</td>
    <td>{{$task->task_name}}</td>
    <td>{{ $task->description  }}</td>
    <td>{{ $task->start_date  }}</td>
    <td>{{ $task->due_date  }}</td>
    <td>
        <select wire:change="updateStatus({{ $task->id }}, $event.target.value)">
            @foreach ($statuses as $status)
                <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </td>
    <td>{{ $task->assigner  }}</td>
   
</tr>
@endforeach
</tbody> --}}
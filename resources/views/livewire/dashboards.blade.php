 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="sparkline13-list">
        <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
                <h1>Tasks <span class="table-project-n"></span> </h1>
        
            </div>
        </div>
        <div class="sparkline13-graph">
            {{-- <div class="datatable-dashv1-list custom-datatable-overright"> --}}
                <div class="modal-area-button">
                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalalert">Add Task</a>
                    {{-- <a class="Primary mg-b-10" href="{{ route('my-task') }}" class="btn btn-link"> My Task</a>
                    <a class="Primary mg-b-10" href="{{ route('create-by-me') }}" class="btn btn-link"> Created by me</a> --}}
                </div>
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">All Tasks</a></li>
                        <li><a href="#reviews">Assigned to me </a></li>
                        <li><a href="#INFORMATION">Create by me</a></li>
                    </ul>
                
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description"  >
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table  id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                                <thead>
                                    <tr >
                                        {{-- <th data-field="state" data-checkbox="false"></th> --}}
                                        <th data-field="id">No</th>
                                        <th data-field="task_name">Task</th>
                                        <th data-field="description">Description</th>
                                        <th data-field="start_date">Start Date</th>
                                        <th data-field="due_date">Due Date</th>
                                        <th data-field="status">Status</th>
                                        <th data-field="assignee">Assigned To</th>
                                        {{-- <th data-field="">Action</th> --}}
                                    </tr>
                                </thead>
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
                            </table>
                            </div>
                        </div>
                        <div  class="product-tab-list tab-pane fade active in" id="reviews">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table  id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                                <thead>
                                    <tr >
                                        {{-- <th data-field="state" data-checkbox="false"></th> --}}
                                        <th data-field="id">No</th>
                                        <th data-field="task_name">Task</th>
                                        <th data-field="description">Description</th>
                                        <th data-field="start_date">Start Date</th>
                                        <th data-field="due_date">Due Date</th>
                                        <th data-field="status">Status</th>
                                        <th data-field="assignee">Assigned By</th>
                                        {{-- <th data-field="">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($results as $index => $task)
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
                                </tbody>
                            </table>
                            </div>
                           
                        
                        </div>
                        <div  class="product-tab-list tab-pane fade active in" id="INFORMATION">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table  id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                                <thead>
                                    <tr >
                                        {{-- <th data-field="state" data-checkbox="false"></th> --}}
                                        <th data-field="id">No</th>
                                        <th data-field="task_name">Task</th>
                                        <th data-field="description">Description</th>
                                        <th data-field="start_date">Start Date</th>
                                        <th data-field="due_date">Due Date</th>
                                        <th data-field="status">Status</th>
                                        <th data-field="assignee">Assigned By</th>
                                        <th data-field="">Action</th>
                                    </tr>
                                </thead>
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
                                            <td>
                                            <button  wire:click="delete({{ $task->id }})" 
                                                wire:confirm="Are you sure you want to delete this post?" class="btn btn-custon-four btn-danger" >Delete
                                            </button>
                                
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            </div>
                           
                        
                        </div>
                      
                    </div>
                </div>
              
                
            {{-- </div> --}}
            
        </div>
    </div>
    
<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
            <h4>Task Info</h4>
            <hr>
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('message') }}

            </div>
            @endif  
            <form wire:submit="saveDataFxn">

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
                        <button type="submit"  class="btn btn-custon-four btn-primary" >Save</button>
                    
                    </div>
            </div>
            </form>
            </div>
            
        </div>
    </div>
</div> 
</div>

              
                
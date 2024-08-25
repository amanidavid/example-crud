
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">

                <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                            <p class="alert alert-warning" wire:offline>
                                Whoops, your device has lost connection. The web page you are viewing is offline.
                            </p>
                            <div class="modal-body">
                                <div class="modal-header">
                                    <h2>Task Info</h2>
                                </div>
                                
                                @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('error') }}
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
                                                <textarea class="form-control" wire:model="description" rows="4" placeholder="Enter description here"></textarea>
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
                                                <select name="assignees[]" id="assignees" class="form-control" wire:model="assignees" multiple="multiple" style="width: 100%;" required>
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
                                            <button type="button" data-dismiss="modal" class="btn btn-custon-four btn-danger">Cancel</button>
                                           
                                            <button type="submit" class="btn btn-custon-four btn-primary">Save</button>
                                           
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @can('create task')
                <div class="modal-area-button">
                    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><span class="fas fa-plus"></span> Add Task</a>
                   
                </div>
                @endcan 
                <br>
                <br>
                {{-- <br>  --}}
                <ul id="myTabedu1" class="tab-review-design">
                   @can('view all tasks')
                    <li class="active"><a href="#description">All Tasks</a></li>
                    @endcan
                    @can('view assigned task')
                    <li><a href="#reviews"> Assigned to me</a></li>
                    @endcan
                    <li><a href="#INFORMATION">Created by me</a></li>
                </ul>
                
                <div id="myTabContent" class="tab-content custom-product-edit">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        {{ session('message') }}

                    </div>
                @endif  
                      
                    <div class="product-tab-list tab-pane fade active in" id="description">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            
                            <table  id="table-all-tasks" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="true"
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
                                    <th data-field="">Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($task as $index => $tasks)
                                <tr wire:key="{{ $tasks->id }}" >
                                <td>{{$index + 1}}</td>
                                <td>{{$tasks->task_name}}</td>
                                <td>{{ $tasks->description  }}</td>
                                <td>{{ $tasks->start_date  }}</td>
                                <td>{{ $tasks->due_date  }}</td>
                                <td>{{ $tasks->status }}</td>
                                <td>{{ $tasks->assignee  }}</td>
                                <td>
                                {{-- <button type="submit" wire:click="deleted({{ $tasks->id }})" class="btn btn-custon-four btn-danger"  wire:offline.class="disabled" >delete</button> --}}
                                <button   
                                data-toggle="modal" data-target="#DangerModalalert" class="btn btn-custon-four btn-danger" >Delete
                            </button>
                            <div id="DangerModalalert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                            <h2>danger !</h2> --}}
                                            <p><h4>Are you sure you want to delete this task?</h4></p>
                                        </div>
                                        <div class="modal-footer danger-md">
                                            {{-- <a data-dismiss="modal" href="#">Cancel</a> --}}
                                            <button type="cancel"  class="btn btn-custon-four btn-danger"  data-dismiss="modal" >Cancel</button>
            
                                            {{-- <a wire:click="delete({{ $task->id }})">Process</a> --}}
                                            <button type="submit" wire:click="deleted({{ $tasks->id }})" class="btn btn-custon-four btn-success"  wire:offline.class="disabled" >Confirm</button>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                   
                    <div class="product-tab-list tab-pane fade" id="reviews">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table  id="table-assigned-tasks" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
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
                                    @can('update status')
                                    <td>
                                        <select wire:change="updateStatus({{ $task->id }}, $event.target.value)">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    @else
                                    <td>{{$task->status}}</td>
                                    @endcan
                                    <td>{{ $task->assigner  }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                   {{-- @endcan --}}
                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                     
                   
                    <div class="datatable-dashv1-list custom-datatable-overright">
                        @if (session()->has('sms'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            {{ session('sms') }}
        
                        </div>
                         @endif
                        <table  id="table-created-tasks" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="false" data-cookie="true"
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
                           @livewire('supervisor-component')
                        </table>
                    
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
   
    <div id="InformationproModalalert" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                <h2>Edit Task</h2>
                {{-- <hr> --}}
            
                <form wire:submit.prevent="updateTask">
    
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Title</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control"  wire:model="task_name" required/>
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
                                <input type="date" class="form-control" wire:model="due_date"  required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
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
                            <button type="submit"  class="btn btn-custon-four btn-primary" >Update</button>
                        
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>









<div class="container-fluid">
  <!-- Single pro tab review Start-->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
                <ul id="myTabedu1" class="tab-review-design">
                    @can('create task')
                    <li class="active"><a href="#description">Add Task Details</a></li>
                    @endcan

                   @can('view all tasks')
                    <li><a href="#reviews"> All Tasks</a></li>
                   @endcan 
                   
                    @can('view assigned task')
                    <li><a href="#INFORMATION">Assigned Task</a></li>       
                    @endcan

                    {{-- @can('view created task') --}}
                    <li><a href="#created">Created By Me</a></li>      
                    {{-- @endcan --}}
                  
                </ul>

                <div id="myTabContent" class="tab-content custom-product-edit">
                    <div class="product-tab-list tab-pane fade active in" id="description">
                        <div class="row">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                {{ session('message') }}
        
                            </div>
                        @endif
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                
                                <div class="review-content-section">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                        <form wire:submit="saveDataFxn" class="addcourse">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" wire:model="task_name" required placeholder="Title"/>
                                                        @error('task_name') <span class="error">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Start Date</label>
                                                        <input type="date" class="form-control" wire:model="start_date" required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
                                                        @error('start_date') <span class="error">{{ $message }}</span> @enderror
                                                        {{-- <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Start Date"> --}}
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Due Date</label>
                                                        <input type="date" class="form-control" wire:model="due_date" required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
                                                        @error('due_date') <span class="error">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Select Assignee</label>
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

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" wire:model="description" rows="4" placeholder="Enter description here"></textarea>
                                                    @error('description') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="product-tab-list tab-pane fade" id="reviews">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               
                                @if (session()->has('sms'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    {{ session('sms') }}
                                   
            
                                </div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                   
                                    <input class="form-control search-box" id="searchInput" type="text" placeholder="Search...">
                                </div> <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S/N</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody> 
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
                                                    {{-- <button wire:click="deleted({{ $tasks->id }})" class="btn btn-custon-four btn-danger" >Show Confirmation </button> --}}
                                                    @can('delete task')
                                                    <button type="button" onclick="showModal()" class="btn btn-custon-four btn-danger">Delete</button>    
                                                    @endcan
                                                    <button wire:click="toEditFxn({{ $tasks }})" class="btn btn-custon-four btn-info" type="button" >Edit </button>
                                                </td>
                                            </tr>
                                             <!-- Delete Confirmation Modal -->
                                             <div id="confirmationModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:1000;">
                                                <div style="background:white; padding:30px; border-radius:8px; text-align:center; width:400px; max-width:90%; box-shadow:0 4px 8px rgba(0,0,0,0.2);">
                                                    <h4 style="margin-bottom:20px; color:#333;">Confirm Deletion</h4>
                                                    <p style="margin-bottom:20px; color:#555;">Are you sure you want to delete this task? This action cannot be undone.</p>
                                                    <div>
                                                        <button onclick="hideModal()" style="padding:10px 20px; border:none; border-radius:4px; background-color:#ccc; color:#333; font-size:16px; cursor:pointer; margin-right:10px;">No</button>
                                                        <button wire:click="deleted({{ $tasks->id }})" id="confirmDeleteButton" style="padding:10px 20px; border:none; border-radius:4px; background-color:hsl(219, 64%, 58%); color:white; font-size:16px; cursor:pointer;">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                    
                     
                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                   
                                    <input class="form-control search-box" id="searchInput" type="text" placeholder="Search...">
                                </div> <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S/N</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Assigned By</th>
                                        <th>Action</th>
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
                    </div>
                        
                    <div class="product-tab-list tab-pane fade" id="created">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               
                                @if (session()->has('sms'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    {{ session('sms') }}
                                   
            
                                </div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                   
                                    <input class="form-control search-box" id="searchInput" type="text" placeholder="Search...">
                                </div> <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S/N</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Action</th>
                                    </thead>
                                   @livewire('supervisor-component')
                                </table>
                            </div>
                        </div>
                    </div> 
                    
               
           

                      {{-- <div class="product-tab-list tab-pane fade" id="INFORMATION">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-content-section">
                                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                        <div class="row">
                                        hello
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   --}}
                 
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function showModal() {
        document.getElementById('confirmationModal').style.display = 'flex';
    }

    function hideModal() {
        document.getElementById('confirmationModal').style.display = 'none';
    }

    function confirmAction() {
        // Placeholder for confirmation action
        console.log('Action confirmed');
        hideModal();
    }
</script>

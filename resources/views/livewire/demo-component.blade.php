<div class="container-fluid">
  <!-- Single pro tab review Start-->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
                <ul id="myTabedu1" class="tab-review-design">
                    <li class="active"><a href="#description">Courses Details</a></li>
                    <li><a href="#reviews"> Acount Information</a></li>
                    <li><a href="#INFORMATION">Social Information</a></li>
                </ul>

                <div id="myTabContent" class="tab-content custom-product-edit">
                    <div class="product-tab-list tab-pane fade active in" id="description">
                        <div class="row">
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
                                                        <label for="title">Title</label>
                                                        <input type="date" class="form-control" wire:model="start_date" required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
                                                        @error('start_date') <span class="error">{{ $message }}</span> @enderror
                                                        {{-- <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Start Date"> --}}
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="date" class="form-control" wire:model="due_date" required min="{{ \Illuminate\Support\Carbon::today()->toDateString() }}" />
                                                        @error('due_date') <span class="error">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S/N</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody> 
                                        @foreach ($task as $index => $tasks)
                                            <tr wire:key="{{ $tasks->id }}" >
                                                <td>{{$index + 1}}</td>
                                                <td>{{$tasks->task_name}}</td>
                                                <td>{{$tasks->task_name}}</td>
                                                <td>
                                                    <button wire:click="deleted({{ $tasks->id }})" class="btn btn-custon-four btn-danger" >Delete </button>
                                                    <button wire:click="toEditFxn({{ $tasks }})" class="btn btn-custon-four btn-info" type="button" >Edit </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-content-section">
                                    <p>
                                        jkuiogo
                                        khguijgkj
                                    </p>
                                    @if($toEdit)
                                        {{$toEdit['task_name']}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

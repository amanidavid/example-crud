@extends("layouts.app")
@section('content')
@include('layouts.style')
<div class="all-content-wrapper">

 
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Created by<span class="table-project-n"> me</span> </h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                      
                                <div >
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
                                            <th data-field="">Action</th>
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
                
            </div>
        </div>
    </div>
    <!-- Static Table End -->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2024. All rights reserved.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
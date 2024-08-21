@extends("layouts.app")
@section('content')
@include('layouts.style')
<div class="all-content-wrapper">

 
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
               @livewire('dashboards')
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
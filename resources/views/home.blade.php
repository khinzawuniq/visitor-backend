@extends('layouts.master')

@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard
            <!--begin::Separator-->
            <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <span class="text-muted fs-7 fw-bold mt-2"></span>
            <!--end::Description--></h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">

        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-6 col-sm-4 col-md-4">
                <div class="card bg-light-success card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body my-3">
                        <a href="#" class="card-title fw-bolder text-success fs-5 mb-3 d-block">Total Staff</a>
                        <div class="py-1">
                            <span class="text-dark fs-1 fw-bolder me-2"> {{$total_staff}} </span>
                            <span class="fw-bold text-muted fs-7">staff</span>
                        </div>
                        
                    </div>
                    <!--end:: Body-->
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-6 col-sm-4 col-md-4">
                <div class="card bg-light-warning card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body my-3">
                        <a href="#" class="card-title fw-bolder text-warning fs-5 mb-3 d-block">Today CheckIn Visitor</a>
                        <div class="py-1">
                            <span class="text-dark fs-1 fw-bolder me-2"> {{$total_check_in}} </span>
                            <span class="fw-bold text-muted fs-7">checkin visitors</span>
                        </div>
                        
                    </div>
                    <!--end:: Body-->
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-6 col-sm-4 col-md-4">
                <div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body my-3">
                        <a href="#" class="card-title fw-bolder text-primary fs-5 mb-3 d-block">Today CheckOut Visitor</a>
                        <div class="py-1">
                            <span class="text-dark fs-1 fw-bolder me-2"> {{$total_check_out}} </span>
                            <span class="fw-bold text-muted fs-7">checkout visitors</span>
                        </div>
                        
                    </div>
                    <!--end:: Body-->
                </div>
            </div>
            <!--end::Col-->
            
        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection

@push('scripts')

<script>
    $(function() {
        
        
    })
</script>

@endpush
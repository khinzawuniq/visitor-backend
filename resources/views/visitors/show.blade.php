@extends('layouts.master')

@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Visitors Detail</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('home')}}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Visitors Detail</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <div class="d-flex justify-content-end">
                <a href="{{route('visitors.index')}}" class="btn btn-secondary btn-sm">Back To Listing</a>
            </div>
            <!--begin::Card body-->
            <div class="card-body py-4">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Full Name</th>
                            <td>:</td>
                            <td> {{$visitor->full_name}} </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td> {{$visitor->email}} </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:</td>
                            <td> {{$visitor->phone}} </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>:</td>
                            <td> {{$visitor->gender}} </td>
                        </tr>
                        <tr>
                            <th>Vehicle/Walk-In</th>
                            <td>:</td>
                            <td> {{$visitor->vehicle_walk_in}} </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td> {{$visitor->address}} </td>
                        </tr>
                        <tr>
                            <th>Purpose</th>
                            <td>:</td>
                            <td> {{$visitor->visit_purpose}} </td>
                        </tr>
                        <tr>
                            <th>Check In</th>
                            <td>:</td>
                            <td> {{$visitor->check_in_date}} </td>
                        </tr>
                        <tr>
                            <th>Check Out</th>
                            <td>:</td>
                            <td> {{$visitor->toArray()['check_out_date']}} </td>
                        </tr>
                        <tr>
                            <th>CheckOut Staff</th>
                            <td>:</td>
                            <td> {{($visitor->check_out_staff)? $visitor->staff->name:''}} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection

@push('scripts')
<script>

</script>
@endpush
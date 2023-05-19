@extends('layouts.master')

@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Visitors List</h1>
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
                <li class="breadcrumb-item text-dark">Visitors List</li>
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

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif
            
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" id="keyword" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search visitor" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar gap-3">
                
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th>#</th>
                            <th class="min-w-125px">Full Name</th>
                            {{-- <th class="min-w-125px">Email</th> --}}
                            <th class="min-w-125px">Phone</th>
                            {{-- <th class="min-w-125px">Gender</th> --}}
                            <th class="min-w-125px">Vehicle / Walk-In</th>
                            <th class="min-w-125px">Check In</th>
                            <th class="min-w-125px">Check Out</th>
                            <th class="min-w-125px">CheckOut Status</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @foreach($visitors as $visitor)
                        <!--begin::Table row-->
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$visitor->full_name}}</td>
                            {{-- <td> {{$visitor->email}}</td> --}}
                            <td> {{$visitor->phone}} </td>
                            {{-- <td> {{$visitor->gender}} </td> --}}
                            <td> {{$visitor->vehicle_walk_in}} </td>
                            <td> {{$visitor->check_in_date}} </td>
                            <td> {{($visitor->check_out_date)?$visitor->toArray()['check_out_date']:''}} </td>
                            <td> 
                                <div class="form-check form-switch form-check-custom form-check-success form-check-solid">

                                    @if($visitor->status == 0)
                                    <input class="form-check-input" type="checkbox" name="status_{{$visitor->id}}" id="status_{{$visitor->id}}" onClick="checkOut({{$visitor->id}})" {{$visitor->status == 1? 'checked':''}} />
                                    @endif
                                    
                                    <label class="form-check-label" for="status_{{$visitor->id}}">
                                        <span class="badge badge-{{$visitor->status == 1?'success':'warning'}}" id="status_label_{{$visitor->id}}">{{$visitor->status == 1?'YES':'NO'}}</span>
                                    </label>
                                </div>
                            </td>
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="{{route('visitors.show', $visitor->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                {{-- <button type="button" id="check_out_{{$visitor->id}}" onclick="checkOut({{$visitor->id}})" class="btn btn-primary btn-sm" {{($visitor->status == 1)?'disabled':''}}>Check Out</button> --}}
                            </td>
                            <!--end::Action=-->
                        </tr>
                        <!--end::Table row-->
                        @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
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
    function checkOut(id)
    {
        var result = confirm("Are you sure Check Out visitor?");

        if(result) {
            $.ajax({
                url: "/visitor-checkout/",
                method: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id: id,
                },
                success: function(data)
                {
                    if(data.visitor) {

                        Swal.fire({
                            text: "Success Check Out",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                            timer: 1000
                        })
                        .then(() => {
                            location.href = location.href
                        })

                    }else {
                        alert('Something went wrong!');
                    }
                }
            });
        }
    }
</script>
@endpush
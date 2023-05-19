@extends('layouts.auth-master')

@section('content')
<!--begin::Content-->
<div class="d-flex flex-center flex-column flex-column-fluid">
    <!--begin::Wrapper-->
    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('login') }}">
            
            @csrf

            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="mb-3">Sign In to Visitor Management</h1>
                <!--end::Title-->
                <!--begin::Link-->
                {{-- <div class="text-gray-400 fw-bold fs-4">New Here?
                <a href="../../demo1/dist/authentication/layouts/aside/sign-up.html" class="link-primary fw-bolder">Create an Account</a></div> --}}
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <!--end::Label-->
                <!--begin::Input-->
                {{-- <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" /> --}}
                <input id="email" type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->

                <!--begin::Input-->
                {{-- <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" /> --}}
                <input id="password" type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!--end::Input-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Input-->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->

            <!--begin::Actions-->
            <div class="text-center">
                <!--begin::Submit button-->
                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-blue w-100 mb-5">
                    <span class="indicator-label">Continue</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Submit button-->
                
            </div>
            
        </form>
        
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Content-->
@endsection

@push('styles')
<style>
    .btn-blue {
        background-color: #004aad;
        color: #ffffff;
    }
    .text-red {
        color: #ff3131;
    }
</style>
@endpush
@extends('layouts.admin')

@section('style')
<link href="{{ asset('assets/css/custom/outline.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!--begin::Tables Widget 11-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Dashboard</span>
            </h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            {{-- @include('pages.includes.outline-list') --}}
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->
@endsection
@section('script')
    <script src="{{ asset('assets/js/custom/outline.js') }}"></script>
@endsection

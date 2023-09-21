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

            <ul id="sortable" class="type-checkboxes form-check text-gray-700 text-large w-50">
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input" checked>
                    <span class="list-item fs-5 fw-bold">Introduction</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input" checked>
                    <span class="list-item fs-5 fw-bold">Importance</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input" >
                    <span class="list-item fs-5 fw-bold">Comparison</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Pros and Cons</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Advantage</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Disadvantage</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Review</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">How to Guide</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Examples</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">FAQ</span>
                    @include('pages.includes.aditional-fields')
                </li>
                <li class="py-3">
                    <input type="checkbox" class="level-checkbox form-check-input" checked>
                    <span class="list-item fs-5 fw-bold">Conclusion</span>
                    @include('pages.includes.aditional-fields')
                </li>
            </ul>

            {{-- <button id="generate-json">Generate JSON</button> --}}

        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->
@endsection
@section('script')
    <script src="{{ asset('assets/js/custom/outline.js') }}"></script>
@endsection

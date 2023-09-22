@extends('layouts.admin')

@section('style')
    <link href="{{ asset('assets/css/custom/outline.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="card">
        <!-- begin::Body-->
        <div class="card-body py-20">
            <!-- begin::Wrapper-->
            <div class="mx-auto w-100">
                <!-- begin::Header-->
                <div class="d-flex justify-content-between flex-column flex-sm-row">
                    <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">AI Article Writer</h4>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="pb-12 row">
                    <div class="col-lg-6">
                        <!--begin::Form-->
                        <form class="form" id="promtMakerForm">
                            @csrf
                            <input name="post_type" id="post_type" value="{{ $post_type }}" hidden>
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Article Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Article Title"
                                    name="article_title" id="article_title" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-bold mb-2">Focus Keywords (Seperate with
                                    Comma)</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Focus Keywords"
                                    name="focus_keywords" />
                                <!--end::Input-->
                            </div>
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-bold mb-2">Exclude Keywords (Seperate with
                                    Comma)</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Exclude Keywords"
                                    name="exclude_keywords" />
                                <!--end::Input-->
                            </div>
                            @include('pages.admin.ai-writer.common-form-element')

                            <!--begin::Checkboxes-->
                            <div class="d-flex align-items-center mb-4">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input h-20px w-20px" type="checkbox" name="custom_outline"
                                        id="custom_outline" value="off" />
                                    <span class="form-check-label fs-5 fw-bold">Custom Outline</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Checkboxes-->
                            <div id="article-outline" hidden>
                                @include('pages.includes.outline-list')
                            </div>

                            <div class="flex-center">
                                <!--begin::Button-->
                                <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                    <span class="indicator-label">Generate</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_new_address_cancel"
                                    class="btn btn-white me-3">Discard</button>
                                <!--end::Button-->
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    {{-- Output --}}
                    <div class="col-lg-6">
                        <div class="container-fluid d-flex flex-stack p-0 mb-2">
                            <label class="fs-5 fw-bold mb-2">Generated Output</label>
                            <div id="output-action" hidden>
                                <!--begin::Svg Icon | path: assets/media/icons/duotone/General/Save.svg-->
                                <button class="btn  btn-icon btn-white" onclick="save_article()">
                                    <span class="svg-icon svg-icon-dark svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3"
                                                height="5" rx="0.5" />
                                        </g>
                                    </svg>
                                </span>
                                </button>
                                <!--end::Svg Icon-->
                                <!--begin::Svg Icon | path: assets/media/icons/duotone/General/Duplicate.svg-->
                                <button class="btn  btn-icon btn-white">
                                    <span class="svg-icon svg-icon-dark svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                    </span>
                                </button>
                                <!--end::Svg Icon-->
                            </div>
                        </div>




                        <div id="streamedData" class="h-100 form-control form-control-solid" rows="5">
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!-- end::Wrapper-->
        </div>
        <!-- end::Body-->
    </div>
@endsection
@section('script')
    {{-- outline js --}}
    <script src="{{ asset('assets/js/custom/outline.js') }}"></script>

    <!-- JavaScript to handle form submission and streaming -->
    <script src="{{ asset('assets/js/admin/streamtext.js') }}"></script>


    <script>
        $("#custom_outline").on('change', function() {
            if (this.checked) {
                $("#article-outline").removeAttr('hidden');
                $("#custom_outline").val('on');
            } else {
                $("#article-outline").prop('hidden', true);
                $("#custom_outline").val('off');
            }
        });

        function save_article() {
            var title = $("#article_title").val();
            var description = $("#streamedData").val();
        }
    </script>
@endsection

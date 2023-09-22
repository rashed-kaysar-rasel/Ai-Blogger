@extends('layouts.admin')
@section('content')
    <!-- begin::Invoice 1-->
    <div class="card">
        <!-- begin::Body-->
        <div class="card-body py-20">
            <!-- begin::Wrapper-->
            <div class="mx-auto w-100">
                <!-- begin::Header-->
                <div class="d-flex justify-content-between flex-column flex-sm-row">
                    <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">Email Generator</h4>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="pb-12 row">
                    <div class="col-lg-6">
                        <!--begin::Form-->
                        <form class="form" id="promtMakerForm">
                            @csrf
                            <input name="post_type" value="{{ $post_type }}" hidden>
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea type="text" class="form-control form-control-solid" placeholder="Description" name="description" required
                                    rows="3"></textarea>
                                <!--end::Input-->
                            </div>
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Subject</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Subject"
                                    name="subject" required />
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
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Focus Keywords" name="focus_keywords" />
                                <!--end::Input-->
                            </div>
                            @include('pages.admin.ai-writer.common-form-element')

                            <div class="flex-center">
                                <!--begin::Button-->
                                <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                    <span class="indicator-label">Generate</span>
                                    <span class="indicator-progress">Please wait...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                    <div class="col-lg-6"> <label class="fs-5 fw-bold mb-2">Generated Output</label>
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
    <!-- JavaScript to handle form submission and streaming -->
    <script src="{{ asset('assets/js/admin/streamtext.js') }}"></script>
@endsection

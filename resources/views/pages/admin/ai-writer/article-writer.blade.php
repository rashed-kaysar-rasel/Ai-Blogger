@extends('layouts.admin')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!-- begin::Invoice 1-->
            <div class="card">
                <!-- begin::Body-->
                <div class="card-body py-20 px-20">
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
                                    <input name="post_type" value="{{ $post_type }}" hidden>
                                    <!--begin::Col-->
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Article Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Article Title" name="article_title" required/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Focus Keywords (Seperate with
                                            Comma)</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Focus Keywords (Seperate with Comma)" name="focus_keywords" />
                                        <!--end::Input-->
                                    </div>
                                    @include('pages.admin.ai-writer.common-form-element')
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
            <!-- end::Invoice 1-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('script')
    <!-- JavaScript to handle form submission and streaming -->
    <script src="{{ asset('assets/js/admin/streamtext.js') }}"></script>

@endsection
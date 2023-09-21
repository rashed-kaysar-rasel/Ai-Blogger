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
                            <input name="post_type" value="{{ $post_type }}" hidden>
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Article Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Article Title"
                                    name="article_title" required />
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

                            <!--begin::Checkboxes-->
                            <div class="d-flex align-items-center mb-4">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input h-20px w-20px" type="checkbox" name="custom_outline"
                                        id="custom_outline" value="on" />
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
    {{-- outline js --}}
    <script src="{{ asset('assets/js/custom/outline.js') }}"></script>
    
    <!-- JavaScript to handle form submission and streaming -->
    <script src="{{ asset('assets/js/admin/streamtext.js') }}"></script>


    <script>
        $("#custom_outline").on('change',function(){
            if(this.checked){
                $("#article-outline").removeAttr('hidden');
            }else{
                $("#article-outline").prop('hidden',tru);
            }
        });
    </script>
@endsection

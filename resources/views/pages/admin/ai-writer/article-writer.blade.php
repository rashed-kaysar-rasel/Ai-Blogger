@extends('layouts.admin')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!-- begin::Invoice 1-->
            <div class="card">
                <!-- begin::Body-->
                <div class="card-body py-20">
                    <!-- begin::Wrapper-->
                    <div class="mw-lg-950px mx-auto w-100">
                        <!-- begin::Header-->
                        <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                            <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">AI Writer</h4>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="border-bottom pb-12">
                            <!--begin::Image-->
                            <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center bgi-size-cover card-rounded h-150px h-lg-250px mb-lg-20"
                                style="background-image: url(assets/media/misc/pattern-4.jpg)"></div>
                            <!--end::Image-->
                        </div>
                        <!--end::Body-->
                        <!-- begin::Footer-->
                        <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                            <!-- begin::Actions-->
                            <div class="my-1 me-5">
                                <!-- begin::Pint-->
                                <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print
                                    Invoice</button>
                                <!-- end::Pint-->
                                <!-- begin::Download-->
                                <button type="button" class="btn btn-light-success my-1">Download</button>
                                <!-- end::Download-->
                            </div>
                            <!-- end::Actions-->
                            <!-- begin::Action-->
                            <button type="button" class="btn btn-dark my-1">Create Invoice</button>
                            <!-- end::Action-->
                        </div>
                        <!-- end::Footer-->
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

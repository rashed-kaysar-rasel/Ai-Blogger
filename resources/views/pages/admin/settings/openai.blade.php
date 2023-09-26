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
                    <div class="mx-auto w-50">
                        <!-- begin::Header-->
                        <div class="d-flex justify-content-between flex-column flex-sm-row">
                            <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">OpenAI Settings</h4>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="pb-12 row">
                            <div class="col-lg-12">
                                <!--begin::Form-->
                                <form class="form" id="openAiSettingForm">
                                    @csrf
                                    <!--begin::Col-->
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold mb-2">OpenAI Secrect Key</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="OpenAI Secrect Key" name="api_key"
                                            value="{{ $openAiSettings->api_key }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold mb-2">Default Model</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="defaul_model" data-control="select2"
                                            data-placeholder="Select a Country..." class="form-select form-select-solid">
                                            <option value="text-davinci-003"
                                                {{ $openAiSettings->default_model === 'text-davinci-003' ? 'selected' : '' }}>
                                                Davinci (Expensive Capable)</option>
                                            <option value="gpt-3.5-turbo"
                                                {{ $openAiSettings->default_model === 'gpt-3.5-turbo' ? 'selected' : '' }}>
                                                ChatGPT (3.5-turbo)</option>
                                            <option value="gpt-3.5-turbo-16k"
                                                {{ $openAiSettings->default_model === 'gpt-3.5-turbo-16k' ? 'selected' : '' }}>
                                                ChatGTP (3.5-turbo-16k)</option>
                                            <option value="gpt-4"
                                                {{ $openAiSettings->default_model === 'gpt-4' ? 'selected' : '' }}>ChatGPT-4
                                                (Most Expensive Fastest Most Capable)</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold mb-2">Default Language</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="language" data-control="select2"
                                            data-placeholder="Select a Country..." class="form-select form-select-solid">

                                            @foreach (get_languages() as $value => $level)
                                                <option value="{{ $value }}" {{ $openAiSettings->default_language === $value ? 'selected' : '' }}>{{ $level }}</option>
                                            @endforeach

                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold mb-2">Default Creativity</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="creativity" data-control="select2"
                                            data-placeholder="Select Creativity..." class="form-select form-select-solid">
                                            <option value="0.25" {{ $openAiSettings->default_creativity === 0.25 ? 'selected' : '' }}>Economic</option>
                                            <option value="0.5" {{ $openAiSettings->default_creativity === 0.5 ? 'selected' : '' }}>Average</option>
                                            <option value="0.75" {{ $openAiSettings->default_creativity === 0.75 ? 'selected' : '' }} >Good</option>
                                            <option value="1" {{ $openAiSettings->default_creativity === 1.00 ? 'selected' : '' }}>Premium</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold mb-2">Default Voice of Tone</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="tone_of_voice" data-control="select2"
                                            data-placeholder="Select a Voice Tone..." class="form-select form-select-solid">
                                            @foreach (get_voice_tones() as $value => $level)
                                                <option value="{{ $value }}" {{ $openAiSettings->default_voice_tone === $value ? 'selected' : '' }}>{{ $level }}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold mb-2"> Maximum Input Length </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid"
                                                placeholder="Maximum Length" min="10" max="2000"
                                                name="max_input_length" value="1000" required />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold mb-2"> Maximum Output Length </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid"
                                                placeholder="Maximum Length" min="10" max="2000"
                                                name="max_output_length" value="1000" required />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--end::Col-->
                                    <div class="flex-center">
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                            <span class="indicator-label">Update</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </form>
                                <!--end::Form-->
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
    <script>
        $("#openAiSettingForm").on('submit', function(e) {
            e.preventDefault();
            var data = $('#openAiSettingForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                data: data,
                url: "{{ route('update.openai.settings', $openAiSettings->id) }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Settings Successfully Updated',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function(data) {}
            });
        });
    </script>
@endsection

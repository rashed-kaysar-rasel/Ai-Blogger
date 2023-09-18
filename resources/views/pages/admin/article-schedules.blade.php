@extends('layouts.admin')
@section('content')
    <!--begin::Tables Widget 11-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Article Schedules</span>
            </h3>

            {{-- modal --}}
            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog">
                    <div class="modal-content">
            
                        <div class="modal-body">
                            <form class="form" id="promtMakerForm">
                                @csrf
                                <!--begin::Col-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Topic (Seperate with
                                        Comma)</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Focus Keywords (Seperate with Comma)" name="focus_keywords" />
                                    <!--end::Input-->
                                </div>
                                                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">Language</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="language" data-control="select2"
                                            data-placeholder="Select a Country..." class="form-select form-select-solid">
                                            @foreach (get_languages() as $value => $level)
                                                <option value="{{ $value }}" {{ 'en-US' === $value ? 'selected' : '' }}>{{ $level }}</option>
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2"> Maximum Length </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid"
                                                placeholder="Maximum Length" min="10" max="2000"
                                                name="maximum_length" value="100" required />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold mb-2">Creativity</label>
                                            <!--end::Label-->
                                            <!--begin::Select-->
                                            <select name="creativity" data-control="select2"
                                                data-placeholder="Select Creativity..."
                                                class="form-select form-select-solid">
                                                <option value="0.25">Economic</option>
                                                <option value="0.5">Average</option>
                                                <option value="0.75" selected="">Good</option>
                                                <option value="1">Premium</option>
                                            </select>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-10">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold mb-2">Tone of Voice</label>
                                            <!--end::Label-->
                                            <!--begin::Select-->
                                            <select name="tone_of_voice" data-control="select2"
                                                data-placeholder="Select a Voice Tone..."
                                                class="form-select form-select-solid">
                                                @foreach (get_voice_tones() as $value => $level)
                                                    <option value="{{ $value }}"
                                                        {{ 'Professional' === $value ? 'selected' : '' }}>
                                                        {{ $level }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="flex-center">
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                                            <span class="indicator-label">Create</span>
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
                        </div>
        
                    </div>
                </div>
            </div>


            <div class="card-toolbar">
                <button class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                    <!--begin::Svg Icon | path: assets/media/icons/duotone/Interface/Plus-Square.svg-->
                    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                fill="#12131A" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                fill="#12131A" />
                        </svg></span>
                    <!--end::Svg Icon-->
                    New Schedule
                    </button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_datatable_example_1" class="table table-row-bordered align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="min-w-325px px-2">Topics</th>
                            <th class="min-w-125px">Frequency</th>
                            <th class="min-w-125px">Length</th>
                            <th class="min-w-150px">Status</th>
                            <th class="min-w-150px">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($schedules as $item)
                            <tr>
                                <td>
                                        @php
                                            $topic = json_decode($item->topics,true);
                                            for ($i=0; $i < count($topic); $i++) { 
                                                echo "<span class='badge badge-light-dark fs-7 fw-bold mx-2'>".$topic[$i]."</span>";
                                            }
                                        @endphp     
                                </td>
                                <td>
                                    <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">Once per <span
                                            class="fw-bolder">{{ $item->frequency }} </span> minutes</a>
                                </td>
                                <td>
                                    <a href="#"
                                        class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $item->length }}</a>
                                </td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                                    @else
                                        <span class="badge badge-light-danger fs-7 fw-bold">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button onclick="edit_schedule('{{ $item->id }}')"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                <path
                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <button onclick="delete_schedule('{{ $item->id }}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->
@endsection
@section('script')
    <script>
        $("#kt_datatable_example_1").DataTable();
        function edit_schedule(id){
            alert("edit "+id);
        }
        function delete_schedule(id){
            alert("delete "+id);
        }
    </script>
@endsection

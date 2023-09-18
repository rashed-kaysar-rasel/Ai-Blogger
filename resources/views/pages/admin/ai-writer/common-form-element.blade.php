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

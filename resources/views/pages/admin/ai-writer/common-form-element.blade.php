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
                                            <option value="ar-AE">Arabic</option>
                                            <option value="cmn-CN">Chinese (Mandarin)</option>
                                            <option value="hr-HR">Croatian (Croatia)</option>
                                            <option value="cs-CZ">Czech (Czech Republic)</option>
                                            <option value="da-DK">Danish (Denmark)</option>
                                            <option value="nl-NL">Dutch (Netherlands)</option>
                                            <option value="en-US" selected="">English (USA)</option>
                                            <option value="et-EE">Estonian (Estonia)</option>
                                            <option value="fi-FI">Finnish (Finland)</option>
                                            <option value="fr-FR">French (France)</option>
                                            <option value="de-DE">German (Germany)</option>
                                            <option value="el-GR">Greek (Greece)</option>
                                            <option value="he-IL">Hebrew (Israel)</option>
                                            <option value="hi-IN">Hindi (India)</option>
                                            <option value="hu-HU">Hungarian (Hungary)</option>
                                            <option value="is-IS">Icelandic (Iceland)</option>
                                            <option value="id-ID">Indonesian (Indonesia)</option>
                                            <option value="it-IT">Italian (Italy)</option>
                                            <option value="ja-JP">Japanese (Japan)</option>
                                            <option value="kk-KZ">Kazakh (Kazakhistan)</option>
                                            <option value="ko-KR">Korean (South Korea)</option>
                                            <option value="lt-LT">Lithuanian (Lithuania)</option>
                                            <option value="ms-MY">Malay (Malaysia)</option>
                                            <option value="nb-NO">Norwegian (Norway)</option>
                                            <option value="pl-PL">Polish (Poland)</option>
                                            <option value="pt-BR">Portuguese (Brazil)</option>
                                            <option value="pt-PT">Portuguese (Portugal)</option>
                                            <option value="ro-RO">Romanian (Romania)</option>
                                            <option value="ru-RU">Russian (Russia)</option>
                                            <option value="sl-SI">Slovenian (Slovenia)</option>
                                            <option value="es-ES">Spanish (Spain)</option>
                                            <option value="sw-KE">Swahili (Kenya)</option>
                                            <option value="sv-SE">Swedish (Sweden)</option>
                                            <option value="tr-TR">Turkish (Turkey)</option>
                                            <option value="vi-VN">Vietnamese (Vietnam)</option>
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
                                            <input type="number" class="form-control form-control-solid" placeholder="Maximum Length" min="10" max="2000"
                                                name="maximum_length" value="100" required/>
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
                                                data-placeholder="Select a Country..."
                                                class="form-select form-select-solid">
                                                <option value="Professional" selected="">Professional</option>
                                                <option value="Funny">Funny</option>
                                                <option value="Casual">Casual</option>
                                                <option value="Excited">Excited</option>
                                                <option value="Witty">Witty</option>
                                                <option value="Sarcastic">Sarcastic</option>
                                                <option value="Feminine">Feminine</option>
                                                <option value="Masculine">Masculine</option>
                                                <option value="Bold">Bold</option>
                                                <option value="Dramatic">Dramatic</option>
                                                <option value="Grumpy">Grumpy</option>
                                                <option value="Secretive">Secretive</option>
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
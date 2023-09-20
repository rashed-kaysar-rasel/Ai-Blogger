@extends('layouts.admin')
@section('content')
    <style>
        #sortable {
            list-style: none;
            /* Remove default list bullets */
            padding-left: 0;
            /* Remove default padding for <ul> */
        }

        #sortable li {
            list-style: none;
            margin: 0;
            /* Reset margin for list items */
            padding-left: 30px;
            /* Adjust the padding-left for spacing */
            position: relative;
            /* Set position to relative for pseudo-element */
        }

        #sortable li:before {
            content: '';
            /* Create a pseudo-element for the custom bullet */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24px' height='24px' viewBox='0 0 24 24' version='1.1'%3E%3Cpath d='M10.4289322,12.3786797 L5.30761184,7.25735931 C4.91708755,6.86683502 4.91708755,6.23367004 5.30761184,5.84314575 C5.69813614,5.45262146 6.33130112,5.45262146 6.72182541,5.84314575 L11.8431458,10.9644661 L18.0355339,4.77207794 C18.4260582,4.38155365 19.0592232,4.38155365 19.4497475,4.77207794 C19.8402718,5.16260223 19.8402718,5.79576721 19.4497475,6.1862915 L13.2573593,12.3786797 L19.4497475,18.5710678 C19.8402718,18.9615921 19.8402718,19.5947571 19.4497475,19.9852814 C19.0592232,20.3758057 18.4260582,20.3758057 18.0355339,19.9852814 L11.8431458,13.7928932 L6.72182541,18.9142136 C6.33130112,19.3047379 5.69813614,19.3047379 5.30761184,18.9142136 C4.91708755,18.5236893 4.91708755,17.8905243 5.30761184,17.5 L10.4289322,12.3786797 Z' fill='%23000000' opacity='0.3' transform='translate(12.378680, 12.378680) rotate(-315.000000) translate(-12.378680, -12.378680) '/%3E%3Cpath d='M3.51471863,12 L5.63603897,14.1213203 C6.02656326,14.6736051 6.02656326,15.1450096 5.63603897,15.5355339 C5.24551468,15.9260582 4.77411016,15.9260582 4.22182541,15.5355339 L0.686291501,12 L4.22182541,8.46446609 C4.69322993,7.99306157 5.16463445,7.99306157 5.63603897,8.46446609 C6.10744349,8.93587061 6.10744349,9.40727514 5.63603897,9.87867966 L3.51471863,12 Z M12,20.4852814 L14.1213203,18.363961 C14.6736051,17.9734367 15.1450096,17.9734367 15.5355339,18.363961 C15.9260582,18.7544853 15.9260582,19.2258898 15.5355339,19.7781746 L12,23.3137085 L8.46446609,19.7781746 C7.99306157,19.3067701 7.99306157,18.8353656 8.46446609,18.363961 C8.93587061,17.8925565 9.40727514,17.8925565 9.87867966,18.363961 L12,20.4852814 Z M20.4852814,12 L18.363961,9.87867966 C17.9734367,9.32639491 17.9734367,8.85499039 18.363961,8.46446609 C18.7544853,8.0739418 19.2258898,8.0739418 19.7781746,8.46446609 L23.3137085,12 L19.7781746,15.5355339 C19.3067701,16.0069384 18.8353656,16.0069384 18.363961,15.5355339 C17.8925565,15.0641294 17.8925565,14.5927249 18.363961,14.1213203 L20.4852814,12 Z M12,3.51471863 L9.87867966,5.63603897 C9.32639491,6.02656326 8.85499039,6.02656326 8.46446609,5.63603897 C8.0739418,5.24551468 8.0739418,4.77411016 8.46446609,4.22182541 L12,0.686291501 L15.5355339,4.22182541 C16.0069384,4.69322993 16.0069384,5.16463445 15.5355339,5.63603897 C15.0641294,6.10744349 14.5927249,6.10744349 14.1213203,5.63603897 L12,3.51471863 Z' fill='%23000000' fill-rule='nonzero'/%3E%3C/svg%3E");
            background-size: 20px 20px;
            width: 20px;
            height: 20px;
            position: absolute;
            /* Position the custom bullet */
            top: 50%;
            /* Vertically center the custom bullet */
            left: 0;
            /* Adjust the left position as needed */
            transform: translateY(-50%);
            /* Center vertically */
        }

         .form-check .form-check-input {
            float: left;
            margin-left: unset;
            margin-right: 0.5rem;
        }
    </style>

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
                <li class="py-2">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Introduction</span>
                    <div class="additional-fields" style="display: none;">
                        <div class="row my-5">
                            <div class="col-md-6 fv-row">
                                <input type="text" class="max-length-input form-control form-control-solid"
                                    placeholder="Max Length">
                            </div>
                            <div class="col-md-6 fv-row">
                                <input type="text" class="keywords-input form-control form-control-solid"
                                    placeholder="Keywords">
                            </div>
                        </div>

                    </div>
                    <div class="type-checkboxes form-check form-check-custom form-check-solid py-2" style="display: none;">
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input px-2"> Paragraph
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Bulletpoint
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Other </label>
                    </div>
                </li>
                <li class="py-2">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Importance</span>
                    <div class="additional-fields" style="display: none;">
                        <div class="row my-5">
                            <div class="col-md-6 fv-row">
                                <input type="text" class="max-length-input form-control form-control-solid"
                                    placeholder="Max Length">
                            </div>
                            <div class="col-md-6 fv-row">
                                <input type="text" class="keywords-input form-control form-control-solid"
                                    placeholder="Keywords">
                            </div>
                        </div>

                    </div>
                    <div class="type-checkboxes form-check form-check-custom form-check-solid py-2" style="display: none;">
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input px-2"> Paragraph
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Bulletpoint
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Other </label>
                    </div>
                </li>
                <li class="py-2">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Pros and Cons</span>
                    <div class="additional-fields" style="display: none;">
                        <div class="row my-5">
                            <div class="col-md-6 fv-row">
                                <input type="text" class="max-length-input form-control form-control-solid"
                                    placeholder="Max Length">
                            </div>
                            <div class="col-md-6 fv-row">
                                <input type="text" class="keywords-input form-control form-control-solid"
                                    placeholder="Keywords">
                            </div>
                        </div>

                    </div>
                    <div class="type-checkboxes form-check form-check-custom form-check-solid py-2" style="display: none;">
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input px-2"> Paragraph
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Bulletpoint
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Other </label>
                    </div>
                </li>
                <li class="py-2">
                    <input type="checkbox" class="level-checkbox form-check-input">
                    <span class="list-item fs-5 fw-bold">Conclusion</span>
                    <div class="additional-fields" style="display: none;">
                        <div class="row my-5">
                            <div class="col-md-6 fv-row">
                                <input type="text" class="max-length-input form-control form-control-solid"
                                    placeholder="Max Length">
                            </div>
                            <div class="col-md-6 fv-row">
                                <input type="text" class="keywords-input form-control form-control-solid"
                                    placeholder="Keywords">
                            </div>
                        </div>

                    </div>
                    <div class="type-checkboxes form-check form-check-custom form-check-solid py-2"
                        style="display: none;">
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input px-2">
                            Paragraph </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Bulletpoint
                        </label>
                        <label class="px-2"><input type="checkbox" class="type-checkbox form-check-input"> Other
                        </label>
                    </div>
                </li>
            </ul>

            {{-- <button id="generate-json">Generate JSON</button> --}}

        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->
@endsection
@section('script')
    <script>
        // Initialize the sortable list
        $(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    // Triggered when the user finishes dragging and dropping an item
                    updateJSONData();
                }
            });
            $("#sortable").disableSelection();
        });

        // Toggle additional fields and type checkboxes when a checkbox is checked
        $(".level-checkbox").on("change", function() {
            var $parentLi = $(this).closest("li");
            var $additionalFields = $parentLi.find(".additional-fields");
            var $typeCheckboxes = $parentLi.find(".type-checkboxes");

            $additionalFields.toggle(this.checked);
            $typeCheckboxes.toggle(this.checked);
        });

        // Generate JSON data based on the list
        $("#generate-json").on("click", function() {
            updateJSONData();
        });

        // Function to update JSON data
        function updateJSONData() {
            var jsonData = [];
            $("#sortable li").each(function() {
                var $listItem = $(this).find(".list-item");
                var $maxLenInput = $(this).find(".max-length-input");
                var $keywordsInput = $(this).find(".keywords-input");
                var $typeCheckboxes = $(this).find(".type-checkbox:checked");

                var types = [];
                $typeCheckboxes.each(function() {
                    types.push($(this).parent().text().trim());
                });

                jsonData.push({
                    item: $listItem.text(),
                    level: $(this).find(".level-checkbox").is(":checked"),
                    maxLength: $maxLenInput.val(),
                    keywords: $keywordsInput.val(),
                    types: types
                });
            });

            // Convert JSON data to a string for display
            var jsonString = JSON.stringify(jsonData, null, 2);
            console.log(jsonString);
            alert("JSON Data:\n\n" + jsonString);
        }
    </script>
@endsection

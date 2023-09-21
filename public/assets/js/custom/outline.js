"use strict";
// Initialize the sortable list
$(function() {
    $("#sortable").sortable({
        update: function(event, ui) {
            // Triggered when the user finishes dragging and dropping an item
            outlineJSONData();
        }
    });
    $("#sortable").disableSelection();

    // Initialize the visibility of additional fields and type checkboxes based on data-checked
    $(".level-checkbox").each(function() {
        var $parentLi = $(this).closest("li");
        var $additionalFields = $parentLi.find(".additional-fields");
        var $typeCheckboxes = $parentLi.find(".type-checkboxes");

        if (this.checked) {
            $additionalFields.show();
            $typeCheckboxes.show();
        } else {
            $additionalFields.hide();
            $typeCheckboxes.hide();
        }
    });
});

// Toggle additional fields and type checkboxes when a checkbox is checked
$(".level-checkbox").on("change", function() {
    var $parentLi = $(this).closest("li");
    var $additionalFields = $parentLi.find(".additional-fields");
    var $typeCheckboxes = $parentLi.find(".type-checkboxes");

    $additionalFields.toggle(this.checked);
    $typeCheckboxes.toggle(this.checked);

    outlineJSONData();
});

// Generate JSON data based on the list
$("#generate-json").on("click", function() {
    outlineJSONData();
});

// Function to update JSON data
function outlineJSONData() {
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
    // console.log(jsonString);
    // alert("JSON Data:\n\n" + jsonString);
    return jsonString;
}
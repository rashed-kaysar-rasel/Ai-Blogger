document.addEventListener("DOMContentLoaded", function () {
    const streamForm = document.getElementById('promtMakerForm');
    const streamedDataDiv = document.getElementById('streamedData');

    streamForm.addEventListener('submit', function (event) {
        event.preventDefault();
        
        $("#output-action").prop('hidden',true);

        var indicator = document.querySelector(".indicator-progress");
        var indicatorLlabel = document.querySelector(".indicator-label");

        indicator.style.display = "block";
        indicatorLlabel.style.display = "none";


        // Initialize an empty formData object
        const formData = {};

        // Select all form elements within the streamForm
        const formElements = streamForm.querySelectorAll('input, select, textarea');

        // Iterate over all form elements and add their values to formData
        formElements.forEach(element => {
            if (element.name) {
                formData[element.name] = element.value;
            }
        });
        
        var post_type = $("#post_type").val();

        if(post_type == 'article_generator' && formData['custom_outline'] == 'on'){
            formData['outline_json'] = outlineJSONData();
        }

        // Clear the streamed data container
        streamedDataDiv.innerHTML = '';

        // Construct the URL with query parameters
        const queryParams = Object.entries(formData)
            .map(([key, value]) => `${key}=${encodeURIComponent(value)}`)
            .join('&');

        const url = `/admin/stream-text?${queryParams}`;

        // Start streaming using the constructed URL
        const eventSource = new EventSource(url);

        eventSource.onmessage = function (event) {
            // const data = event.data;
            const data = event.data.replace(/\n/g, ''); // Remove \n characters

            streamedDataDiv.innerHTML += `${data}`;
        };

        

        eventSource.onerror = function (event) {
            eventSource.close();
            indicator.style.display = "none";
            indicatorLlabel.style.display = "block";
            $("#output-action").removeAttr('hidden');
        };


    });
});

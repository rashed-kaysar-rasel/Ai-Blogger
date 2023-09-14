document.addEventListener("DOMContentLoaded", function () {
    const streamForm = document.getElementById('promtMakerForm');
    const streamedDataDiv = document.getElementById('streamedData');

    streamForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Get all form inputs and create an object to store their values
        const formData = {};
        const formInputs = streamForm.querySelectorAll('input');
        const formSelect = streamForm.querySelectorAll('select');
        const formTextarea = streamForm.querySelectorAll('textarea');

        formInputs.forEach(input => {
            formData[input.name] = input.value;
        });
        formSelect.forEach(select => {
            formData[select.name] = select.value;
        });
        formTextarea.forEach(textarea => {
            formData[textarea.name] = textarea.value;
        });

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
        };


    });
});

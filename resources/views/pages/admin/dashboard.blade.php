@extends('layouts.admin')
@section('content')
<h1>Streamed Data</h1>

    <!-- Form to input max number and delay -->
    <form id="streamForm">
        @csrf
        <label for="max">Max Number:</label>
        <input type="number" id="max" name="max" required>
        
        <label for="delay">Delay (seconds):</label>
        <input type="number" id="delay" name="delay" required>
        
        <button type="submit">Start Streaming</button>
    </form>
    
    <!-- Container for streamed data -->
    <div id="streamedData"></div>

@endsection
@section('script')
    
 <!-- JavaScript to handle form submission and streaming -->
 <script>

document.addEventListener("DOMContentLoaded", function() {
    const streamForm = document.getElementById('streamForm');
    const streamedDataDiv = document.getElementById('streamedData');

    streamForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Get all form inputs and create an object to store their values
        const formData = {};
        const formInputs = streamForm.querySelectorAll('input');
        
        formInputs.forEach(input => {
            formData[input.name] = input.value;
        });

        // Clear the streamed data container
        streamedDataDiv.innerHTML = '';

        // Construct the URL with query parameters
        const queryParams = Object.entries(formData)
            .map(([key, value]) => `${key}=${encodeURIComponent(value)}`)
            .join('&');

        const url = `/admin/stream-data?${queryParams}`;

        // Start streaming using the constructed URL
        const eventSource = new EventSource(url);

        eventSource.onmessage = function(event) {
            const data = event.data;
            streamedDataDiv.innerHTML += `<p>${data}</p>`;
        };

        eventSource.onerror = function(event) {
            console.error('Error occurred:', event);
            eventSource.close();
        };
    });
});
</script>

@endsection
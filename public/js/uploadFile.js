document.addEventListener('DOMContentLoaded', () => {
    const dropzoneInput = document.getElementById('dokumen_wajib');
    const dropzoneContainer = document.getElementById('dropzone-container');
    const uploadProgress = document.getElementById('upload-progress');
    const progressBar = document.getElementById('progress-bar');
    const uploadedFileName = document.getElementById('uploaded-file-name');
    const removeFileBtn = document.getElementById('remove-file-btn');

    // Handle file input change
    dropzoneInput.addEventListener('change', handleFileUpload);

    // Drag and drop functionality
    dropzoneContainer.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzoneContainer.classList.add('bg-gray-100');
    });

    dropzoneContainer.addEventListener('dragleave', () => {
        dropzoneContainer.classList.remove('bg-gray-100');
    });

    dropzoneContainer.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzoneContainer.classList.remove('bg-gray-100');
        const file = e.dataTransfer.files[0];
        if (file) {
            dropzoneInput.files = e.dataTransfer.files;
            handleFileUpload();
        }
    });

    // Handle file upload logic
    function handleFileUpload() {
        const file = dropzoneInput.files[0];
        if (file) {
            uploadedFileName.textContent = file.name;
            dropzoneContainer.classList.add('hidden');
            uploadProgress.classList.remove('hidden');

            // Simulate upload progress
            let progress = 0;
            const interval = setInterval(() => {
                progress += 10;
                progressBar.style.width = `${progress}%`;
                if (progress >= 100) {
                    clearInterval(interval);
                }
            }, 200);
        }
    }

    // Remove uploaded file
    removeFileBtn.addEventListener('click', () => {
        dropzoneInput.value = ''; // Clear file input
        uploadProgress.classList.add('hidden');
        dropzoneContainer.classList.remove('hidden');
        progressBar.style.width = '0%';
    });
});


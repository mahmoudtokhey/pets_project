document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.getElementById('submitBtn');
    const nameInput = document.getElementById('nameInput');
    const categorySelect = document.getElementById('categorySelect');

    // Add event listeners for input fields
    nameInput.addEventListener('input', validateForm);
    categorySelect.addEventListener('change', validateForm);

    // Validation function
    function validateForm() {
        // Check if all required fields are filled
        if (
            nameInput.value.trim() !== '' &&
            categorySelect.value !== 'Select the category' &&
            AboutTextarea.value.trim() !== '' &&
            characteristicsTextarea.value.trim() !== '' &&
            DietaryTextarea.value.trim() !== '' &&
            careTextarea.value.trim() !== '' &&
            healthTextarea.value.trim() !== '' &&
            document.querySelectorAll('.multi-img1-container img').length > 0 &&
            document.querySelectorAll('.multi-img2-container img').length > 0 &&
            document.querySelectorAll('.multi-img3-container img').length > 0
        ) {
            // Enable the submit button
            submitBtn.disabled = false;
            return true;
        } else {
            // Disable the submit button
            submitBtn.disabled = true;
            return false;
        }
    }

    // Image display functionality
    function displaySelectedImage(event) {
        const input = event.target;

        if (input.files && input.files[0]) {
            const files = Array.from(input.files); // Convert FileList to array
            const container = input.parentElement.nextElementSibling; // Select the container next to the input

            // Clear existing images if inputGroupFile01 or inputGroupFile03 is changed
            if (input.id === 'inputGroupFile01' || input.id === 'inputGroupFile03') {
                container.innerHTML = '';
            }

            files.forEach(file => {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add(input.id === 'inputGroupFile02' ? 'multi-img2' : 'multi-img'); // Add different class for inputGroupFile02

                        // Add delete functionality
                        img.addEventListener('click', function() {
                            this.remove();
                            // After removing the image, validate the form again
                            validateForm();
                        });

                        container.appendChild(img);
                        // After adding the image, validate the form
                        validateForm();
                    };

                    reader.readAsDataURL(file);
                } else {
                    alert('Please select an image file.');
                    input.value = ''; // Clear the input field to allow re-selection
                }
            });
        }
    }

    // Add event listener for file input changes
    document.getElementById('inputGroupFile01').addEventListener('change', displaySelectedImage);
    document.getElementById('inputGroupFile02').addEventListener('change', displaySelectedImage);
    document.getElementById('inputGroupFile03').addEventListener('change', displaySelectedImage);
});

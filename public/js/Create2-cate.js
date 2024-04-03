// Checkbox functionality
const submitBtn = document.getElementById('submitBtn'); // Define the submit button
const nameInput = document.getElementById('nameInput');
const imageInput = document.getElementById('inputGroupFile01');
const imageInput2 = document.getElementById('inputGroupFile02');

// Add event listener for name input
nameInput.addEventListener('input', validateForm);

// Create Category Image : Add event listener for image input
imageInput.addEventListener('change', validateForm);
// Edit Category Image : Add event listener for image input
imageInput2.addEventListener('change', validateForm);

// Validation function
function validateForm() {
    // Check if all required fields are filled
    if (
        nameInput.value.trim() !== '' &&
        document.querySelectorAll('.multi-img').length > 0
    ) {
        // Enable the submit button
        submitBtn.disabled = false;
        return true;
    }
    else {
        // Disable the submit button
        submitBtn.disabled = true;
        return false;
    }
}

// Image display functionality
function displaySelectedImage(event,container_class) {
    const input = event.target;

    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();

        // Check if the file type is an image
        if (file.type.match('image.*')) {
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('multi-img');

                // Clear existing images
                const container = document.querySelector(`.${container_class}`);
                container.innerHTML = '';

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
    }
}

// Add event listener for form submission
document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally
    // Check if the form is valid
    if (validateForm()) {
        // If valid, submit the form
        alert('Form submitted!');
    } else {
        // If not valid, show an error message
        alert('Please fill in all required fields.');
    }
});

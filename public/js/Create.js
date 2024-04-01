// Checkbox functionality
const checkbox = document.getElementById('flexCheckDefault');
const submitBtn = document.getElementById('submitBtn');
const nameInput = document.querySelector('.name-input');
const priceInput = document.querySelector('[placeholder="Enter Price"]');
const phoneInput = document.querySelector('[placeholder="Enter Phone"]');
const citySelect = document.querySelector('.form-select[aria-label="Default select example"]');
const categorySelect = document.querySelectorAll('.form-select')[1];
const animalTypeSelect = document.querySelectorAll('.form-select')[2];

checkbox.addEventListener('change', function() {
  submitBtn.disabled = !this.checked || !validateForm();
});

// Validation function
function validateForm() {
  // Check if all required fields are filled
  if (
    nameInput.value.trim() !== '' &&
    priceInput.value.trim() !== '' &&
    phoneInput.value.trim() !== '' &&
    citySelect.value !== 'Select City' &&
    categorySelect.value !== 'Select the category' &&
    animalTypeSelect.value !== 'Select Type of Animal'
  ) {
    return true;
  } else {
    return false;
  }
}

// Image display functionality
function displaySelectedImage(event) {
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
                
                // Add delete functionality
                img.addEventListener('click', function() {
                    this.remove();
                });

                const container = document.querySelector('.multi-img-container');
                container.appendChild(img);
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please select an image file.');
            input.value = ''; // Clear the input field to allow re-selection
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
  const monthInput = document.getElementById("expiry-date-month");
  const yearInput = document.getElementById("expiry-date-year");
  const cvcInput = document.getElementById("cvc");
  const cardNumberInput = document.getElementById("card-number");
  const amountInput = document.getElementById("amount");
  const nameInput = document.getElementById("name");

  // Function to validate that input contains only numbers
  const validateNumbers = (input) => {
    const pattern = /^\d+$/;
    return pattern.test(input.value);
  };

  // Function to validate the number of digits
  const validateDigits = (input, numberOfDigits) => {
    const pattern = new RegExp(`^\\d{${numberOfDigits}}$`);
    return pattern.test(input.value);
  };

  // Function to validate that input contains only letters
  const validateLetters = (input) => {
    const pattern = /^[A-Za-z\s]+$/;
    return pattern.test(input.value);
  };

  // Function to add 'SR' next to the amount if it's a number
  const addSRToAmount = () => {
    if (validateNumbers(amountInput)) {
      amountInput.value += " SR";
    }
  };

  // Event listener for month input
  monthInput.addEventListener("input", function () {
    if (!validateNumbers(this)) {
      this.value = this.value.replace(/[^0-9]/g, "");
    }
    if (!validateDigits(this, 2)) {
      this.value = this.value.slice(0, 2);
    }
  });

  // Event listener for year input
  yearInput.addEventListener("input", function () {
    if (!validateNumbers(this)) {
      this.value = this.value.replace(/[^0-9]/g, "");
    }
    if (!validateDigits(this, 4)) {
      this.value = this.value.slice(0, 4);
    }
  });

  // Event listener for CVC input
  cvcInput.addEventListener("input", function () {
    if (!validateNumbers(this)) {
      this.value = this.value.replace(/[^0-9]/g, "");
    }
    if (!validateDigits(this, 3)) {
      this.value = this.value.slice(0, 3);
    }
  });

  // Event listener for card number input
  cardNumberInput.addEventListener("input", function () {
    if (!validateNumbers(this)) {
      this.value = this.value.replace(/[^0-9]/g, "");
    }
  });

  // Event listener for amount input
  amountInput.addEventListener("input", function () {
    if (!validateNumbers(this)) {
      this.value = this.value.replace(/[^0-9]/g, "");
    }
    addSRToAmount();
  });

  // Event listener for name input
  nameInput.addEventListener("input", function () {
    if (!validateLetters(this)) {
      this.value = this.value.replace(/[^A-Za-z\s]/g, "");
    }
  });
});

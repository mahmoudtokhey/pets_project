const createProfileBtn = document.querySelector(".create-animal-profile");

if (createProfileBtn) {
  createProfileBtn.addEventListener("click", () => {
    const input = document.querySelector(".name-input");
    console.log(input);

    input.addEventListener("keypress", function (event) {
      const charCode = event.charCode;
      if (
        !(charCode >= 65 && charCode <= 90) &&
        !(charCode >= 97 && charCode <= 122) &&
        !(charCode === 32) && // space
        !(charCode >= 1536 && charCode <= 1791) &&
        !(charCode >= 65136 && charCode <= 65276)
      ) {
        event.preventDefault();
      }
    });
  });
}

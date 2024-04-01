let moreAnimalsContainer = document.querySelector(".more-animals");
let showMoreBtn = document.querySelector(".show-more");
const cardsContainer = document.querySelector(
  ".animal-container .cards-container"
);
if (cardsContainer) {
  const cards = cardsContainer.querySelectorAll(".card");
}

if (showMoreBtn) {
  showMoreBtn.addEventListener("click", () => {
    const clonedCards = Array.from(cards)
      .slice(-4)
      .map((card) => card.cloneNode(true));
    console.log(clonedCards);
    clonedCards.forEach((clonedCard) => {
      moreAnimalsContainer.appendChild(clonedCard);
    });
  });
}

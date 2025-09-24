
    const items = document.querySelectorAll(".faq-item");

    items.forEach(item => {
      const question = item.querySelector(".faq-question");
      const icon = item.querySelector(".icon");

      question.addEventListener("click", () => {
        item.classList.toggle("active");
        icon.textContent = item.classList.contains("active") ? "➖" : "➕";
      });
    });
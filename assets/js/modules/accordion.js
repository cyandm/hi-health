import { activateEl, addListener } from "../utils/functions";

// Todo: selector must be class
const faqHandlers = document.querySelectorAll(".faq__content__items");
const faqAnswers = document.querySelectorAll(".faq__content__answer");

if (faqHandlers) {
  faqHandlers.forEach((faqHandler) => {
    addListener(faqHandler, "click", (e) => {
      const answer = faqHandler;

      faqHandlers.forEach((answerInner) => {
        if (answerInner === answer) return;
        answerInner.classList.remove("active");
      });

      answer.classList.toggle("active");
    });
  });
}

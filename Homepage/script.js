
// devices section
const deviceCards = document.querySelectorAll('.device-card');

deviceCards.forEach(card => {
  card.addEventListener('mouseenter', () => {
    card.style.backgroundColor = '#eee'; // Highlight on hover
  });

  card.addEventListener('mouseleave', () => {
    card.style.backgroundColor = ''; // Reset on leave
  });
});


  document.addEventListener('DOMContentLoaded', () => {
    const questions = document.querySelectorAll('.faq-question');
    questions.forEach(question => {
      question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        if (answer.style.display === 'block') {
          answer.style.display = 'none'; // Hide answer
        } else {
          answer.style.display = 'block'; // Show answer
        }
      });
    });
  });




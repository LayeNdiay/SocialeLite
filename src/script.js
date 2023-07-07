const msgerForm = get('.msger-inputarea');
const msgerInput = get('.msger-input');
const msgerChat = get('.msger-chat');
const btn = get('.hidden');
msgerForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const msgText = msgerInput.value;
  if (!msgText) return;

  appendMessage('right', msgText);
  msgerInput.value = '';
});

function appendMessage(side, text) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>
        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML('beforeend', msgHTML);
  msgerChat.scrollTop += 500;
}

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const h = '0' + date.getHours();
  const m = '0' + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
}

function random(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function faireClicker() {
  // var isDropdownOpen = btn.getAttribute('aria-expanded') === 'true';
  btn.classList.remove('hidden');
  // Inversez l'état du dropdown en fonction de son état actuel
  // if (isDropdownOpen) {
  //   btn.setAttribute('aria-expanded', 'false');
  //   btn.click();
  // } else {
  //   btn.click();
  //   btn.setAttribute('aria-expanded', 'true');
  // }
  // btn.dropdown('toggle');
}

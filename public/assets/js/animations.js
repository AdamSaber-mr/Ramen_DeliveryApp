// JS auto-fade

const flash = document.querySelector('.flash');
if (flash) {
  setTimeout(() => {
    flash.style.opacity = '0';
    setTimeout(() => flash.remove(), 300);
  }, 2500);
}



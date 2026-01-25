const track = document.querySelector('.categories__track');

let isDown = false;
let startX;
let scrollLeft;

track.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - track.offsetLeft;
  scrollLeft = track.scrollLeft;
});

track.addEventListener('mouseleave', () => isDown = false);
track.addEventListener('mouseup', () => isDown = false);

track.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - track.offsetLeft;
  const walk = (x - startX) * 1.2;
  track.scrollLeft = scrollLeft - walk;
});

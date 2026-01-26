function openCart() {
  document.getElementById('cartOverlay').style.display = 'flex';
  document.body.style.overflow = 'hidden';
}

function closeCart() {
  document.getElementById('cartOverlay').style.display = 'none';
  document.body.style.overflow = '';
}

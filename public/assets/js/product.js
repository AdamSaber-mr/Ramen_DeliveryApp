const price = 16.5;
let quantity = 1;

const qtyEl = document.getElementById('quantity');
const totalEl = document.getElementById('total-price');

document.getElementById('plus').onclick = () => {
  quantity++;
  update();
};

document.getElementById('minus').onclick = () => {
  if (quantity > 1) {
    quantity--;
    update();
  }
};

function update() {
  qtyEl.textContent = quantity;
  totalEl.textContent = `€${(price * quantity).toFixed(2)}`;
}

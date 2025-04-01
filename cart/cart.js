document.addEventListener("DOMContentLoaded", function() {
  const cartPopup = document.getElementById('cart-popup');
  const openCartBtn = document.getElementById('open-cart');
  const closeCartBtn = document.getElementById('close-cart');
  const cartItems = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  let total = 0;

  openCartBtn.addEventListener('click', () => {
    cartPopup.style.display = 'block';
  });

  closeCartBtn.addEventListener('click', () => {
    cartPopup.style.display = 'none';
  });

  function addToCart(name, price) {
    const li = document.createElement('li');
    li.textContent = `${name} - $${price.toFixed(2)}`;
    const removeBtn = document.createElement('button');
    removeBtn.textContent = 'Remove';
    removeBtn.onclick = () => {
      cartItems.removeChild(li);
      total -= price;
      updateTotal();
    };
    li.appendChild(removeBtn);
    cartItems.appendChild(li);
    total += price;
    updateTotal();
  }

  function updateTotal() {
    cartTotal.textContent = total.toFixed(2);
  }

  document.querySelectorAll('.buy-now').forEach(button => {
    button.addEventListener('click', (event) => {
      event.preventDefault();
      const productCard = button.closest('.product-card');
      const name = productCard.querySelector('h3').textContent;
      const price = parseFloat(productCard.querySelector('.price').textContent.replace('$', ''));
      addToCart(name, price);
    });
  });

  // Fetch and insert menu.html content at the beginning of the body
  fetch("menu.html")
    .then(response => response.text())
    .then(data => {
      document.body.insertAdjacentHTML('afterbegin', data);
    });
});

// Sidebar toggle functions
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
                          }

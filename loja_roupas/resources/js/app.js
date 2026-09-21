const cartCount = document.querySelector('#cart-count');
const cartDrawer = document.querySelector('#cart-drawer');
const cartOverlay = document.querySelector('#cart-overlay');
const cartItemsElement = document.querySelector('#cart-items');
const cartTotal = document.querySelector('#cart-total');
const checkoutButton = document.querySelector('#checkout-button');
const cart = [];

if (!cartCount || !cartDrawer) {
	// The admin pages share this bundle but do not render the storefront cart.
} else {

const formatPrice = (value) => value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

const renderCart = () => {
	const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
	const totalPrice = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
	cartCount.textContent = totalItems;
	cartTotal.textContent = formatPrice(totalPrice);
	checkoutButton.disabled = cart.length === 0;

	if (cart.length === 0) {
		cartItemsElement.innerHTML = '<p class="cart-empty">Sua sacola está vazia.</p>';
		return;
	}

	cartItemsElement.innerHTML = cart.map((item, index) => `
		<div class="cart-item">
			<div><strong>${item.name}</strong><span>${formatPrice(item.price)}</span></div>
			<div class="cart-item-actions"><span>Qtd. ${item.quantity}</span><button type="button" data-remove="${index}">Remover</button></div>
		</div>
	`).join('');
};

const toggleCart = (isOpen) => {
	cartDrawer.classList.toggle('is-open', isOpen);
	cartOverlay.hidden = !isOpen;
	cartDrawer.setAttribute('aria-hidden', String(!isOpen));
};

document.querySelector('.cart-button').addEventListener('click', () => toggleCart(true));
document.querySelector('#cart-close').addEventListener('click', () => toggleCart(false));
cartOverlay.addEventListener('click', () => toggleCart(false));

document.querySelectorAll('.add-button').forEach((button) => {
	button.addEventListener('click', () => {
		const card = button.closest('.product-card');
		const name = card.querySelector('h3').textContent.trim();
		const price = Number(card.querySelector('.price').textContent.replace(/[^0-9,]/g, '').replace(',', '.'));
		const existingItem = cart.find((item) => item.name === name);

		if (existingItem) existingItem.quantity += 1;
		else cart.push({ name, price, quantity: 1 });
		button.textContent = 'Adicionado';
		renderCart();
	});
});

cartItemsElement.addEventListener('click', (event) => {
	const removeButton = event.target.closest('[data-remove]');
	if (!removeButton) return;
	cart.splice(Number(removeButton.dataset.remove), 1);
	renderCart();
});

renderCart();
}

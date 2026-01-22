document.addEventListener('click', async (e) => {
    // Check if the clicked element is the button or contained within it (for the icon)
    const button = e.target.closest('.btn-add-panier');

    if (button) {
        e.preventDefault();
        const filmId = button.dataset.movieId;

        // Disable button immediately to prevent double clicks
        button.disabled = true;
        const originalText = button.innerHTML;
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Ajout...';

        const url = `/panier/add/${filmId}`;
        console.log(`Sending add to cart request to ${url}`);

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (response.ok) {
                const data = await response.json();
                console.log('Added to cart:', data);
                button.textContent = 'Ajouté !';

                // Mettre à jour le compteur dans le header
                const cartCountBadge = document.getElementById('cart-count');
                if (cartCountBadge && data.count !== undefined) {
                    cartCountBadge.textContent = data.count;
                }

                // Remove generic classes and add success style
                button.classList.remove('btn-primary', 'btn-outline-primary', 'add-cart-btn');
                button.classList.add('btn-success', 'add-cart-btn');
                button.style.backgroundColor = '#198754';
                button.style.cursor = 'default';
                button.style.border = 'none';
                button.title = 'Déjà au panier';
            } else {
                button.disabled = false;
                button.innerHTML = originalText;
                if (response.status === 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Erreur lors de l\'ajout au panier', response.status);
                    alert('Erreur lors de l\'ajout au panier (Status ' + response.status + ').');
                }
            }
        } catch (error) {
            console.error('Erreur réseau:', error);
            button.disabled = false;
            button.innerHTML = originalText;
            alert('Erreur réseau. Veuillez vérifier votre connexion.');
        }
    }
});

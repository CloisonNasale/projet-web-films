document.addEventListener('DOMContentLoaded', () => {
    const favBtns = document.querySelectorAll('.favorite-btn');
    console.log('Boutons favoris trouvés :', favBtns.length); // <--- ici
    favBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            btn.classList.toggle('favorited');
            btn.classList.toggle('not-favorited');
            console.log('Bouton cliqué !', btn); // <--- et ici
        });
    });
});

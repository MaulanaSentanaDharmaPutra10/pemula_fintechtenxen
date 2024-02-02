const hamburgerBtn = document.getElementById('hamburger');
const menuContainer = document.getElementById('menuContainer');

hamburgerBtn.addEventListener('click', function() {
    menuContainer.classList.toggle('hidden');
});

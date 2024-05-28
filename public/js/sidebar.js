function removeActiveClass() {
    document.getElementById('sidebar').classList.remove('active');
}

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        removeActiveClass();
    }
});

document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
});

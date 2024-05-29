const sidebar = document.getElementById('sidebar');
const sidebarToggles = document.querySelectorAll('.sidebar-toggle');

const removeActiveClass = () => {
    sidebar.classList.remove('active');
};

const debounce = (func, wait) => {
    let timeout;
    return () => {
        clearTimeout(timeout);
        timeout = setTimeout(func, wait);
    };
};

const handleResize = () => {
    if (window.innerWidth > 768) {
        removeActiveClass();
    }
};

const handleClickOutside = (event) => {
    if (sidebar.classList.contains('active') && !sidebar.contains(event.target) && !Array.from(sidebarToggles).some(toggle => toggle.contains(event.target))) {
        removeActiveClass();
    }
};

window.addEventListener('resize', debounce(handleResize, 100));

sidebarToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
});

document.addEventListener('click', handleClickOutside);

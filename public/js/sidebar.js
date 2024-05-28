const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.querySelector('.sidebar-toggle');

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

window.addEventListener('resize', debounce(handleResize, 100));

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

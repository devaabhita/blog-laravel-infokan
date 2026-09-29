const root = document.documentElement;
const btn = document.getElementById('theme-toggle');

if (btn) {
    const render = () => {
        btn.textContent = root.classList.contains('dark') ? '☀️' : '🌙';
    };
    render();

    btn.addEventListener('click', () => {
        const dark = root.classList.toggle('dark');
        try {
            localStorage.setItem('theme', dark ? 'dark' : 'light');
        } catch (e) {}
        render();
    });
}

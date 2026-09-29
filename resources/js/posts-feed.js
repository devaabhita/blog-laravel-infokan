const root = document.querySelector('[data-feed]');

if (root) {
    const grid = root.querySelector('[data-feed-grid]');
    const more = root.querySelector('[data-feed-more]');
    const tabs = root.querySelectorAll('[data-tab]');
    const on = ['bg-slate-900', 'text-white', 'dark:bg-brand-600'];
    let tab = 'terbaru';
    let page = 1;

    const load = async (reset) => {
        more.disabled = true;
        try {
            const res = await fetch(`${root.dataset.url}?tab=${tab}&page=${page}`, {
                headers: { Accept: 'application/json' },
            });
            const data = await res.json();
            if (reset) grid.innerHTML = data.html;
            else grid.insertAdjacentHTML('beforeend', data.html);
            more.classList.toggle('hidden', !data.has_more);
        } finally {
            more.disabled = false;
        }
    };

    tabs.forEach((t) =>
        t.addEventListener('click', () => {
            if (t.dataset.tab === tab) return;
            tab = t.dataset.tab;
            page = 1;
            tabs.forEach((x) => on.forEach((c) => x.classList.toggle(c, x === t)));
            load(true);
        })
    );

    more.addEventListener('click', () => {
        page++;
        load(false);
    });
}

export default function csTabs(csApp) {
    let $tabsNav = document.querySelectorAll('.js-tab');
    if ($tabsNav.length === 0) return;
    $tabsNav.forEach(($nav) => {
        $nav.addEventListener('click', (e) => {
            if (e.target.nodeName === "BUTTON" && !e.target.classList.contains('active')) {
                let $container = e.target.closest('.tabs');
                $container.querySelectorAll('.tabs-nav > .tabs-item').forEach(($button) => {
                    $button.classList.remove('active');
                    let $target = document.querySelector('#' + $button.dataset.target);
                    if ($target) {
                        $target.classList.remove('active');
                    }
                });
                let $target = document.querySelector('#' + e.target.dataset.target);
                if ($target) {
                    $target.classList.add('active');
                    e.target.classList.add('active');
                    csApp.pZooms.updateAll();

                }
            }
        });
    });
	setTimeout(function() {
		csApp.pZooms.updateAll();
	},300);	
}
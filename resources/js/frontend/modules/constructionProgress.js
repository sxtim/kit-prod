import Swiper from 'swiper/bundle';

let dropdownCloseListenerBound = false;

function closeDropdown(dropdown) {
    const button = dropdown.querySelector('[data-progress-dropdown-button]');
    const content = dropdown.querySelector('[data-progress-dropdown-content]');

    button?.classList.remove('open');
    button?.setAttribute('aria-expanded', 'false');
    content?.classList.remove('active');
}

function closeOtherDropdowns(currentDropdown) {
    document.querySelectorAll('[data-progress-dropdown]').forEach(dropdown => {
        if (dropdown !== currentDropdown) {
            closeDropdown(dropdown);
        }
    });
}

function initFilters() {
    document.querySelectorAll('[data-construction-progress]').forEach(block => {
        if (block.dataset.progressFiltersInitialized === 'true') {
            return;
        }

        block.dataset.progressFiltersInitialized = 'true';

        const yearDropdown = block.querySelector('[data-progress-filter="year"]');
        const monthDropdown = block.querySelector('[data-progress-filter="month"]');
        const dropdowns = block.querySelectorAll('[data-progress-dropdown]');
        const cards = block.querySelectorAll('[data-progress-card]');
        const empty = block.querySelector('[data-progress-empty]');

        if (!cards.length) {
            return;
        }

        const apply = () => {
            const year = yearDropdown?.dataset.value || '';
            const month = monthDropdown?.dataset.value || '';
            let visibleCount = 0;

            cards.forEach(card => {
                const isVisible = (!year || card.dataset.year === year)
                    && (!month || card.dataset.month === month);

                card.hidden = !isVisible;

                if (isVisible) {
                    visibleCount += 1;
                }
            });

            if (empty) {
                empty.hidden = visibleCount > 0;
            }
        };

        dropdowns.forEach(dropdown => {
            const button = dropdown.querySelector('[data-progress-dropdown-button]');
            const content = dropdown.querySelector('[data-progress-dropdown-content]');
            const options = dropdown.querySelectorAll('[data-progress-filter-value]');

            button?.addEventListener('click', event => {
                event.preventDefault();
                event.stopPropagation();

                closeOtherDropdowns(dropdown);

                const isOpen = content?.classList.toggle('active');

                button.classList.toggle('open', Boolean(isOpen));
                button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });

            options.forEach(option => {
                option.addEventListener('click', event => {
                    event.preventDefault();
                    event.stopPropagation();

                    dropdown.dataset.value = option.dataset.progressFilterValue || '';
                    button.textContent = option.textContent.trim();

                    options.forEach(item => {
                        const isSelected = item === option;

                        item.classList.toggle('selected', isSelected);
                        item.setAttribute('aria-selected', isSelected ? 'true' : 'false');
                    });

                    closeDropdown(dropdown);
                    apply();
                });
            });
        });

        apply();
    });

    if (!dropdownCloseListenerBound) {
        dropdownCloseListenerBound = true;

        document.addEventListener('click', event => {
            document.querySelectorAll('[data-progress-dropdown]').forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    closeDropdown(dropdown);
                }
            });
        });
    }
}

function updateCounter(modal, swiper) {
    const counter = modal.querySelector('[data-progress-counter]');
    const total = modal.querySelectorAll('[data-progress-thumb]').length || swiper.slides.length;

    if (counter) {
        counter.textContent = `${swiper.realIndex + 1} / ${total}`;
    }
}

function initModalSlider(modal) {
    if (modal.constructionProgressSwiper) {
        return modal.constructionProgressSwiper;
    }

    const mainEl = modal.querySelector('[data-progress-main]');
    const thumbsEl = modal.querySelector('[data-progress-thumbs]');
    const prevEl = modal.querySelector('[data-progress-prev]');
    const nextEl = modal.querySelector('[data-progress-next]');
    let thumbsSwiper = null;

    if (!mainEl) {
        return null;
    }

    const slideCount = modal.querySelectorAll('[data-progress-slide]').length;

    if (thumbsEl) {
        thumbsSwiper = new Swiper(thumbsEl, {
            slidesPerView: 'auto',
            spaceBetween: 16,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                0: {
                    spaceBetween: 10,
                },
                999: {
                    spaceBetween: 16,
                },
            },
        });
    }

    const mainSwiper = new Swiper(mainEl, {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: slideCount > 1,
        speed: 300,
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        navigation: {
            prevEl,
            nextEl,
        },
        thumbs: thumbsSwiper ? {
            swiper: thumbsSwiper,
            autoScrollOffset: 1,
        } : undefined,
        on: {
            init(swiper) {
                updateCounter(modal, swiper);
            },
            slideChange(swiper) {
                updateCounter(modal, swiper);
            },
        },
    });

    modal.constructionProgressSwiper = mainSwiper;
    modal.constructionProgressThumbsSwiper = thumbsSwiper;

    return mainSwiper;
}

function openModal(modal, index) {
    modal.classList.add('active');
    document.body.classList.add('no-scroll');
    modal.focus({ preventScroll: true });

    const swiper = initModalSlider(modal);

    if (swiper) {
        swiper.update();
        modal.constructionProgressThumbsSwiper?.update();
        swiper.slideToLoop(Number(index || 0), 0);
    }
}

function closeModal(modal) {
    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    if (!document.querySelector('.modal.active, .construction-progress-modal.active')) {
        document.body.classList.remove('no-scroll');
    }
}

function initOpenClose() {
    document.addEventListener('click', event => {
        const trigger = event.target.closest('[data-progress-start][data-progress-modal]');

        if (!trigger) {
            return;
        }

        const modal = document.getElementById(trigger.dataset.progressModal);

        if (!modal || !modal.matches('[data-construction-slider]')) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();
        openModal(modal, trigger.dataset.progressStart);
    }, true);

    document.addEventListener('click', event => {
        const closeTrigger = event.target.closest('.construction-progress-modal .modal__overlay, .construction-progress-modal .modal__close');

        if (!closeTrigger) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();
        closeModal(closeTrigger.closest('.construction-progress-modal'));
    }, true);

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            closeModal(document.querySelector('.construction-progress-modal.active'));
        }
    });
}

export default function initConstructionProgress() {
    initFilters();
    initOpenClose();
}

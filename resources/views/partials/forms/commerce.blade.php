<div class="modal" id="modal-buyback">
    <div class="modal__overlay"></div>
    <div class="modal__content">
        <button class="modal__close" aria-label="Закрыть модальное окно">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <div class="modal__title">Забронировать коммерческое помещение</div>
        <div class="modal__form">
            <div class="form-contact__container">
                <form class="form-contact">
                    <label class="form-contact__label" for="modal-name">Ваше имя</label>
                    <input type="text" id="modal-name" placeholder="Имя" required>

                    <label class="form-contact__label" for="modal-phone">Телефон</label>
                    <input type="tel" id="modal-phone" placeholder="+7 999 999 99 99" required>

                    <button class="form-contact__btn btn btn-green" type="submit">Отправить</button>

                    <div class="form-agreement-container">
                        <input type="checkbox" id="modal-agreement" class="custom-checkbox" required>
                        <label for="modal-agreement">Я ознакомлен(-а) с <a href="personal-agreement.html"
                                                                           target="_blank">Политикой обработки персональных данных </a>и даю свое <a href="agreement-opd.html"
                                                                                                                                                     target="_blank">согласие на обработку</a> персональных данных.</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
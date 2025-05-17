<div class="apartment-form__wrap">
    <div class="apartment-form__content">
        <h3>Получите персональную подборку планировок</h3>
        <div class="form-contact__container">
            <div class="form-contact__container">
                <form class="form-contact">
                    @csrf
                    <input type="hidden" name="form_entity" value="layout">
                    <label class="form-contact__label" for="name">Ваше имя</label>
                    <input type="text" id="name" name="name" placeholder="Имя" required>

                    <label class="form-contact__label" for="phone">Телефон</label>
                    <input type="tel" id="phone" name="phone" placeholder="+7 999 999 99 99" required>

                    <button class="form-contact__btn btn btn-green" type="submit">Отправить</button>

                    <div class="form-agreement-container">
                        <input class="custom-checkbox" type="checkbox" id="agreement" name="agreement" required>
                        <label for="agreement">Я ознакомлен(-а) с <a href="personal-agreement.html" target="_blank">Политикой обработки
                                персональных данных</a> и даю свое <a href="agreement-opd.html" target="_blank">согласие на обработку</a>
                            персональных данных.</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="apartment-form__image"></div>
</div>
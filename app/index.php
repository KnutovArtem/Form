<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="./css/main.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LdvgvkUAAAAAPD4xQzWh3fWG3ap-d6OZzFhF2xf"></script>
</head>
<body> 

<main>

    <div class='block-text'>
        <h1 class='block-text__title'>Форма обратной связи:</h1>
        <p class='block-text__item'>- Recaptcha 3</p>
        <p class='block-text__item'>- Маска поля телефон</p>
        <p class='block-text__item'>- Стилизация выпадающего списка</p>
    </div>
    
    <p class='info-mail'>Сообщение успешно отправлено!</p>

    <form class="form">

        <input class="form-input form-req form-name" type="text" name="name" placeholder="Имя" required>
        <input class="form-input form-req form-email" type="email" name="email" placeholder="Email" required>
        <input class="form-input form-req form-tel" type="tel" name="tel" placeholder="Телефон" required>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">

        <div class="form-input form-select">
            <p class="title-select">Выберите из списка</p>
            <ul class="wrapper-select-items" data-simplebar>
                <li class="select-item">1</li>
                <li class="select-item">2</li>
                <li class="select-item">3</li>
                <li class="select-item">4</li>
                <li class="select-item">5</li>
                <li class="select-item">6</li>
                <li class="select-item">7</li>
                <li class="select-item">8</li>
                <li class="select-item">9</li>
                <li class="select-item">10</li>
            </ul>
        </div>

        <textarea class='form-input form-req form-text' placeholder='Комментарий'></textarea>

        <input class="form-checkbox" type="checkbox" id="checkbox">
        <label for="checkbox">Если согласен, кликай</label>

        <input class="form-button" type="submit" data-badge="inline" placeholder="Отправить">

    </form>

</main>

<script src="./js/scripts.min.js"></script>

<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('6LdvgvkUAAAAAPD4xQzWh3fWG3ap-d6OZzFhF2xf', {action: 'homepage'}).then(function (token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>

</body>
</html>
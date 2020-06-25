"use strict";

let btn = document.querySelector('.form-button');

btn.addEventListener('click', (event) => {
    event.preventDefault();

    let inputName = document.querySelector('.form-name').value;
    let inputEmail = document.querySelector('.form-email').value;
    let inputTel = document.querySelector('.form-tel').value;
    let grecaptcha = document.querySelector('#g-recaptcha-response').value;

    const request = new XMLHttpRequest();

    const url = "send.php";

    const params = "name=" + inputName + "&email=" + inputEmail + "&tel=" + inputTel + "&g-recaptcha-response=" + grecaptcha;

    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            console.dir(request.responseText);

            // let formInput = document.querySelectorAll('.form-req');
            // let titleSelect = document.querySelector('.title-select');
            // let checkbox = document.querySelector('#checkbox');
            // let infoMail = document.querySelector('.info-mail');
            //
            // for (let inputValue of formInput) {inputValue.value = '';}
            // titleSelect.innerHTML = 'Выберите из списка';
            // checkbox.checked = false;
            //
            // infoMail.style.cssText = `opacity: 1;`;
            // setTimeout(function() {
            //     infoMail.style.cssText = `opacity: 0;`;
            // }, 5000);

        }
    });

    request.send(params);
});


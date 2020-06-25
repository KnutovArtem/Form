"use strict";

let formSelect = document.querySelector('.form-select');
let wrapSelectItems = document.querySelector('.wrapper-select-items');

formSelect.addEventListener('click', () => {
    wrapSelectItems.classList.toggle('active');
});

let selectItem = document.querySelectorAll('.select-item');
let titleSelect = document.querySelector('.title-select');

selectItem.forEach((elem) => {
    elem.addEventListener('click', () => {
        titleSelect.innerHTML = elem.innerHTML;
    });
});
const prettyBytes = require('pretty-bytes');
const toNumber = str => +str;

const component = document.querySelector('#settings_max_size');

if (component) {
    const helpComponent = document.querySelector('#settings_max_size_help');
    helpComponent.textContent = prettyBytes(toNumber(component.value));

    component.addEventListener('keyup', event => {
        helpComponent.textContent = prettyBytes(toNumber(event.currentTarget.value));
    });
}

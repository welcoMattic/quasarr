import Dialog, { setDefaults } from 'a11y-dialog-component';

setDefaults({
    documentSelector: 'body',
    documentDisabledClass: 'modal-open',
    backdropSelector: '.backdrop',
});

const tvShowSeasonsDialog = new Dialog('#tvshow-seasons-modal', {
    openingSelector: '.js-dialog-open',
    closingSelector: '.js-dialog-close',
    labelledby: 'modal-title',
    onOpen: (dialog, opener) => {
        dialog.insertAdjacentHTML('beforebegin', '<div class="backdrop"></div>')
        dialog.classList.remove('invisible')

        fetch(opener.dataset.url)
            .then((response) => {
                return response.text()
            }).then((html) => {
                dialog.querySelector('.modal-content').innerHTML = html;
            })
    },
    onClose: (dialog) => {
        document.querySelector('body').querySelector('.backdrop').remove()
        dialog.classList.add('invisible')
        dialog.querySelector('.modal-content').innerHTML = '';
    }
})

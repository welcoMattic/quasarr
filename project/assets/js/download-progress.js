const badgeClasses = {
    downloading: 'light',
    seeding: 'success',
    paused: 'warning'
}
const progressBarClasses = {
    downloading: 'primary',
    seeding: 'success',
    paused: 'warning'
}
const statusIcons = {
    downloading: '<i class="gg-arrow-down-o"></i>',
    seeding: '<i class="gg-check-o"></i>',
    paused: '<i class="gg-play-pause-o"></i>',
}

const components = document.querySelectorAll('[data-component="download-progress"]')
components.forEach((component) => {
    const status = component.dataset.status

    if (status.toLowerCase() === 'missing') {
        return;
    }

    const statusUrl = component.dataset.statusUrl
    const resumeUrl = component.dataset.resumeUrl
    const pauseUrl = component.dataset.pauseUrl
    const movieId = component.dataset.movieId

    setInterval(function () {
        fetch(statusUrl)
            .then((response) => response.json())
            .then((data) => {
                const progressBar = document.querySelector(`#progress-${movieId}`)
                const titleMovieBadge = document.querySelector(`#title-badge-${movieId}`)

                progressBar.style.width = data.progress + '%'
                progressBar.setAttribute('aria-valuenow', data.progress)
                progressBar.innerText = data.progress + '%'
                progressBar.classList.remove('bg-warning')
                progressBar.classList.remove('bg-primary')
                progressBar.classList.remove('bg-success')
                progressBar.classList.add(`bg-${progressBarClasses[data.status.toLowerCase()]}`)

                titleMovieBadge.innerHTML = statusIcons[data.status.toLowerCase()];
                titleMovieBadge.classList.remove('badge-warning')
                titleMovieBadge.classList.remove('badge-primary')
                titleMovieBadge.classList.remove('badge-success')
                titleMovieBadge.classList.add(`badge-${badgeClasses[data.status.toLowerCase()]}`)
            })
    }, 1000)

    document.querySelector('#resume-torrent').addEventListener('click', () => fetch(resumeUrl))
    document.querySelector('#pause-torrent').addEventListener('click', () => fetch(pauseUrl))
});

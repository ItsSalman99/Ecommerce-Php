
/* preload animation */
window.onload = () => fadeOutEffect(document.querySelector(".preload"));



function fadeOutEffect(fadeTarget) {
    let fadeEffect = setInterval( () => {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }
        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.2;
        } else {
            fadeTarget.style.display = "none";
            clearInterval(fadeEffect);
        }
    }, 200);
}

window.onload = resize;
window.onresize = resize;

function resize() {
    if (window.innerHeight > window.innerWidth) return;
    setTimeout(function () {
        let w = 150;
        if (document.body.scrollHeight > document.body.clientHeight) {
            while (document.body.scrollHeight > document.body.clientHeight) {
                console.log(w);
                w--;
                if (w < 10) break;
                setMWidth(w);
            }
        } else {
            while (document.body.scrollHeight == document.body.clientHeight) {
                console.log(w);
                w++;
                if (w > 300) break;
                setMWidth(w);
            }
        }
    }, 0);
}

function setMWidth(w) {
    document.querySelectorAll("img").forEach(e => {
        e.style.maxWidth = w + "px";
    });
}
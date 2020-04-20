window.onload = resize;
window.onresize = resize;

function resize() {
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
                if (w < 10) break;
                setMWidth(w);
            }
            resize();
        }
    }, 0);
}

function setMWidth(w) {
    document.querySelectorAll("img").forEach(e => {
        e.style.maxWidth = w + "px";
    });
}
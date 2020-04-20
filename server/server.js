const express = require('express');
const fs = require('fs');
const app = express();

let style = fs.readFileSync("style.css");

fs.watch("./style.css", (curr, prev) => {
    console.log("Reloading");
    style = fs.readFileSync("style.css");
});


app.use('/Emojis', express.static("Emojis"));
app.use('/script.js', express.static("script.js"));

app.get('/', (req, res) => {
    console.log(req.url);
    if (req.url.indexOf("Emojis") == 1) {
        console.log("Emojis");
    }
    let out = `<html><style>${style}</style>`;
    //res.send('An alligator approaches!');
    let dir = fs.readdirSync("./Emojis");
    let pngs = [];
    for (let file of dir) {
        if (file.split(".")[1] == "png") {
            pngs.push(file);
        }
    }
    console.log(pngs.length);
    for (let png of pngs) {
        let [name, extension] = png.split(".");
        out += `<div class="box"><img src="Emojis/${png}"/><div class="name">${name}</div></div>`;
    }
    res.end(out + "<script src='script.js'></script></html>");
});

app.listen(3000, () => console.log('Listening on port 3000!'));
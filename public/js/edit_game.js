
document.getElementById('cover-game').addEventListener('change', onChange); 

let coverGame = document.getElementById('cover-game');
let urlGame = document.getElementById('url-game');

function onChange(event){
    urlGame.value="http://127.0.0.1/public/images/" + coverGame.files[0].name;
}



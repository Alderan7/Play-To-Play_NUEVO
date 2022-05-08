
document.getElementById('usuario').addEventListener('change', onChange); 
document.getElementById('creador').addEventListener('change', onChange);

let botonUsuario = document.getElementById('buttonUser');
let botonCreador = document.getElementById('buttonCreator');

let planesUsuario = document.getElementById('planesUsuario');
let planesCreador = document.getElementById('planesCreador');

let tiposDePlanesUsuario = document.getElementsByClassName('tipos-de-planes-usuario');
let tiposDePlanesCreador = document.getElementsByClassName('tipos-de-planes-creador');

for(let i=0;i<tiposDePlanesUsuario.length;i++){
    tiposDePlanesUsuario[i].addEventListener('change', onChange2);    
    tiposDePlanesCreador[i].addEventListener('change', onChange2);
}
tiposDePlanesUsuario[0].setAttribute("checked",""); 
function onChange(event){
    if(event.target.value==="creador"){
        planesUsuario.classList.add("opaco");
        botonUsuario.setAttribute("disabled","");
        
        planesCreador.classList.remove("opaco");
        botonCreador.removeAttribute("disabled");

        for(let i=0;i<tiposDePlanesUsuario.length;i++){
            tiposDePlanesUsuario[i].setAttribute("disabled","");
        }

        for(let i=0;i<tiposDePlanesCreador.length;i++){
            tiposDePlanesCreador[i].removeAttribute("disabled");
        }
        tiposDePlanesCreador[0].setAttribute("checked",""); 
        console.log(event.target.value)
    }else{
        planesCreador.classList.add("opaco");
        botonCreador.setAttribute("disabled","");
        
        planesUsuario.classList.remove("opaco");
        botonUsuario.removeAttribute("disabled");        

        for(let i=0;i<tiposDePlanesUsuario.length;i++){
            tiposDePlanesUsuario[i].removeAttribute("disabled");            
        }

        for(let i=0;i<tiposDePlanesCreador.length;i++){
            tiposDePlanesCreador[i].setAttribute("disabled","");
        }

        tiposDePlanesUsuario[0].setAttribute("checked",""); 

        console.log(event.target.value)
    }
}

function onChange2(event){
    console.log(event.target.value)
}
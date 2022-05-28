
document.getElementById('usuario').addEventListener('change', onChange); 
document.getElementById('creador').addEventListener('change', onChange);

let botonUsuario = document.getElementById('buttonUser');
let botonCreador = document.getElementById('buttonCreator');

let planesUsuario = document.getElementById('planesUsuario');
let planesCreador = document.getElementById('planesCreador');

let tiposDePlanesUsuario = document.getElementsByClassName('tipos-de-planes-usuario');
let tiposDePlanesCreador = document.getElementsByClassName('tipos-de-planes-creador');

function onChange(event){
    if(event.target.value==="creador"){
        tiposDePlanesCreador[0].setAttribute("checked","");
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
    }else{
        tiposDePlanesUsuario[0].setAttribute("checked","");
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
    }
}

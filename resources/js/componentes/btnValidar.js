
class btnValidar extends HTMLElement {
    constructor(){
        super();
        this.attachShadow({mode:'open'});
        this.name;
        this.fDatos = this.fDatos.bind(this);

    }
    connectedCallback(){
        this.shadowRoot.innerHTML = "<button type='submit' id='validar' name='validar'>Guardar</button>";
        var btValidar = this.shadowRoot.getElementById('validar');
        btValidar.addEventListener("click",this.fDatos);
    }
    static get observedAttributes(){
        return['name'];
    }
    /**
     * Se llama a esta función cuando se hace click sobre el boton Guardar
     * Esta función guarda el formulario en un objeto FormData y lo
     * envia como parámetro a la funcion validar.
     * @param {*} e 
     */
    fDatos(e){
        e.preventDefault();
        var formulario = document.getElementById("formulario");
        var datos = new FormData(formulario);
        var validados = validar(datos);
    }
}
/**
 * Función que valida los datos que el usuario a introducido en el
 * formulario de alta
 * @param {*} datos Es un objeto FormData que contiene los datos que 
 * se han introducido en el formulario.
 */
function validar(datos){
    try{
        console.log("funcion validar");
        var accion = datos.get("nombre");
        console.log(accion + " nombre");

    }catch(error){
        console.log(error)
    }
}
customElements.define('btn-validar',btnValidar);
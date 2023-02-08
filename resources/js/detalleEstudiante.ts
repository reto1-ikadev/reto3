function getId():String {
    let id:HTMLElement =  <HTMLElement>document.getElementById('id_persona');
    return id.innerText;
}
function getPersona(){
    let id:String = getId();
    fetch('/estudiantes/encontrar?id='+id, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
                let tabla:HTMLElement = <HTMLElement>document.getElementById('tabla');
                tabla.innerHTML = '';
                data.data.forEach(function (element:any){
                    tabla.innerHTML += `
                <tr>
                    <td>${element.nombre}</td>
                    <td>${element.apellidos}</td>
                    <td>${element.grado}</td>
                    <td>${element.curso}</td>
                    <td>${element.empresa}</td>
                    <td><a class="btn btn-danger" href="/estudiantes/detalle/${element.id_alumno}">Ver</a></td>
                </tr>
                `;
                });
            }
        )
        .catch(error => {
                console.log(error);
            }
        );
}
getPersona();



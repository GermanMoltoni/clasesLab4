export class Empleado {
    public nombre:string;
    public legajo;
    public edad;
    public tipo;
    public pathFoto;
    public id;
    constructor(nombre:string,legajo:string,tipo:string,edad:string,pathFoto:string,id?:string){
        this.nombre = nombre;
        this.legajo = legajo;
        this.tipo = tipo;
        this.edad = edad;
        this.pathFoto = pathFoto;
        this.id = id;
    }
}

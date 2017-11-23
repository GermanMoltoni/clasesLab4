export class Persona {
    public nombre;
    public apellido;
    public sexo:string;
    public latitud:number;
    public longitud:number;
    public direccion;
    public id;
    constructor(nombre,apellido,sexo,direccion,latitud:number,longitud:number,id?:number){
        this.nombre = nombre;
        this.latitud = latitud;
        this.longitud = longitud;
        this.direccion = direccion;
        this.apellido = apellido;
        this.sexo = sexo;
        this.id = id;
    }
}

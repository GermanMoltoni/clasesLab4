export class Persona {
    private nombre:string;
    private mail:string;
    private sexo:string;
    private id:number;
    private password:string;
    private habilitado:boolean;
    private pathFoto:string;
    constructor(nombre:string,sexo:string,mail:string,pathFoto:string,password?:string,id?:number,habilitado?:boolean){
        this.nombre = nombre;
        this.mail = mail;
        this.sexo = sexo;
        this.id = id;
        this.password = password;
        this.habilitado = habilitado;
        this.pathFoto=pathFoto;
    }

}
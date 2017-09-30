export class Persona {
    private nombre:string;
    private mail:string;
    private sexo:string;
    private id:number;
    private password:string;
    private habilitado:boolean;
    constructor(nombre:string,sexo:string,mail:string,password?:string,id?:number,habilitado?:boolean){
        this.nombre = nombre;
        this.mail = mail;
        this.sexo = sexo;
        this.id = id;
        this.password = password;
        this.habilitado = habilitado;
    }

}

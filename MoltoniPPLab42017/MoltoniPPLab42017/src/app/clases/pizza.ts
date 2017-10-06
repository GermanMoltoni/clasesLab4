export class Pizza {
    public sabor:string;
    public tipo:string;
    public cantidad:string;
    public id:number;
    public pathFoto:string;
    constructor(sabor:string,cantidad:string,tipo:string,pathFoto:string,id?:number){
        this.sabor = sabor;
        this.tipo = tipo;
        this.cantidad = cantidad;
        this.id = id;
        this.pathFoto=pathFoto;
    }
}
export abstract class Juego {
    public nombre:string;
    public gano:boolean;
    public jugador;
    public intentos:number;
    public tiempo;
    public maxIntentos:number;
    constructor(nombre:string){
        this.nombre=nombre;
        this.gano=false;
    }
    public abstract Verificar();
    public abstract GenerarNuevo();
}
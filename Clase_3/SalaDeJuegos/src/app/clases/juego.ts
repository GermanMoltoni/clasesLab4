export  abstract class Juego {
    public nombre:string;
    public gano:boolean;
    public jugador;
    public intentos:number;
    public tiempo;
    public maxIntentos:number;
    constructor(nombre:string,jugador:string){
        this.nombre=nombre;
        this.gano=false;
        this.jugador = jugador;
    }
    public abstract  Verificar();
    public  abstract GenerarNuevo();
}
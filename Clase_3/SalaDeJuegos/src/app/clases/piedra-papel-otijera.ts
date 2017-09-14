
import {Juego} from './juego';

export class PiedraPapelOTijera  extends Juego{
    private maquina:number;
    public opcion:number;
    constructor(nombre:string,jugador:string){
        super(nombre,jugador);
    }
    GenerarNuevo(){
        this.maquina = Math.floor(Math.random() * 3) + 1;
    }
    Verificar(){
        this.GenerarNuevo();
        if(this.gano = (this.maquina == this.opcion))
            this.tiempo =1;// (new Date().getTime() - this.tiempo.getTime());
    }
}
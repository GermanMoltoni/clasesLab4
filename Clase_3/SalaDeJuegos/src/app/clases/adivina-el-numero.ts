import {Juego} from './juego';
export class AdivinaElNumero extends Juego{
    public numeroSecreto:number;
    public nIngresado:number;
    constructor(nombre:string){
        super(nombre);   
    }
    Verificar(){
        return (this.gano = this.numeroSecreto == this.nIngresado);
    }
    GenerarNuevo(){
        this.gano=false;
        this.numeroSecreto = Math.round(Math.random()*100);
    }
}

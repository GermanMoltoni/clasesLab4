import {Juego} from './juego';

export class AgilidadAritmetica extends Juego{
    private numUno:number;
    private numDos:number;
    private operador:string;
    public nIngresado:number;
    public resultado:number;
    constructor(nombre:string,jugador:string){
        super(nombre,jugador);
    }
    GenerarNuevo(){
        this.numUno = Math.round(Math.random()*100);
        this.numDos =  Math.round(Math.random()*100);
        switch (Math.floor(Math.random() * 3) + 1) {
            case 1:
                this.resultado = this.numUno+this.numDos;
                this.operador = '+';
                break;
            case 2:
                this.resultado = this.numUno-this.numDos;
                this.operador = '-';
                break;
            case 3:
                this.resultado = this.numUno/this.numDos;
                this.operador = '/';
                break;
            case 4:
                this.resultado = this.numUno*this.numDos;
                this.operador = '*';
                break;
            default:
                break;
        }
        this.tiempo=new Date();
    }
    Verificar(){
        if(this.gano = (this.nIngresado == this.resultado))
            this.tiempo =1;// (new Date().getTime() - this.tiempo.getTime());
    }
}
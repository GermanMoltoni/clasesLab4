import { Component, OnInit,Output,EventEmitter } from '@angular/core';
import { PiedraPapelOTijera } from '../../clases/piedra-papel-otijera';
import {Juego} from '../../clases/juego';
@Component({
  selector: 'app-piedra-papel-otijera',
  templateUrl: './piedra-papel-otijera.component.html',
  styleUrls: ['./piedra-papel-otijera.component.css']
})
export class PiedraPapelOTijeraComponent implements OnInit {
  public juego:PiedraPapelOTijera;
  @Output() enviarJuego:EventEmitter<Juego> =new EventEmitter<Juego>();

  constructor() { 
        this.juego = new PiedraPapelOTijera('Piedra Papel O Tijera',localStorage.getItem("usuario"));

  }

  ngOnInit() {
  }

  Jugar(opcion:string){
    switch (opcion) {
      case 'pierda':
        this.juego.opcion=1;
                this.juego.Verificar();

        break;
      case 'papel':
        this.juego.opcion=2;
                this.juego.Verificar();

        break;
      case 'tijera':
        this.juego.opcion=3;
        this.juego.Verificar();
        break;
      default:
        break;
    }
 
  }

}

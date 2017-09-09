import { Component, OnInit,Output,EventEmitter } from '@angular/core';
import {AgilidadAritmetica } from '../../clases/agilidad-aritmetica';
import {Juego} from '../../clases/juego';

@Component({
  selector: 'app-agilidad-aritmetica',
  templateUrl: './agilidad-aritmetica.component.html',
  styleUrls: ['./agilidad-aritmetica.component.css']
})
export class AgilidadAritmeticaComponent implements OnInit {
  private juego : AgilidadAritmetica;
    @Output() enviarJuego:EventEmitter<Juego> =new EventEmitter<Juego>();

  constructor() { 
    this.juego = new AgilidadAritmetica('Agilidad Aritmetica',localStorage.getItem("usuario"));
  }

  ngOnInit() {
  }
  Verificar(){
    this.juego.Verificar()
    if(this.juego.gano)
      this.enviarJuego.emit(this.juego);//Emite evento
    
  }

}

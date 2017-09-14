import { Component, OnInit,Output,EventEmitter } from '@angular/core';
import {AdivinaElNumero} from '../../clases/adivina-el-numero';
import {Juego} from '../../clases/juego';
@Component({
  selector: 'app-adivina-el-numero',
  templateUrl: './adivina-el-numero.component.html',
  styleUrls: ['./adivina-el-numero.component.css']
})
export class AdivinaElNumeroComponent implements OnInit {
  private juego:AdivinaElNumero;
  @Output() enviarJuego:EventEmitter<Juego> =new EventEmitter<Juego>();
  constructor() { 
    this.juego = new AdivinaElNumero('Adivina el numero',localStorage.getItem("usuario"));
    
  }
  ngOnInit() {
  }
  GenerarNuevo(){
    this.juego = new AdivinaElNumero('Adivina el numero',localStorage.getItem("usuario"));
    this.juego.GenerarNuevo();
  }
  Verificar(){
    if(this.juego.Verificar())
      this.enviarJuego.emit(this.juego);//Emite evento y envia un juego
  }

}

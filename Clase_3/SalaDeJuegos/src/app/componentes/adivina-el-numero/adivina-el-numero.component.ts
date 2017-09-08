import { Component, OnInit,Output,EventEmitter } from '@angular/core';
import {AdivinaElNumero} from '../../clases/adivina-el-numero';
@Component({
  selector: 'app-adivina-el-numero',
  templateUrl: './adivina-el-numero.component.html',
  styleUrls: ['./adivina-el-numero.component.css']
})
export class AdivinaElNumeroComponent implements OnInit {
  private juego:AdivinaElNumero;
  @Output() enviarJuego:EventEmitter<Juego>
  constructor() { 
    this.juego = new AdivinaElNumero('Adivina el numero',localStorage.getItem("nombre"));
  }
  ngOnInit() {
  }

}

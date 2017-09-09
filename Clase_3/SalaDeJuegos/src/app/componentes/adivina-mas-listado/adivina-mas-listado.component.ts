import { Component, OnInit } from '@angular/core';
import {Juego} from '../../clases/juego';
@Component({
  selector: 'app-adivina-mas-listado',
  templateUrl: './adivina-mas-listado.component.html',
  styleUrls: ['./adivina-mas-listado.component.css']
})
export class AdivinaMasListadoComponent implements OnInit {

  listadoParaCompartir:Juego[];
  constructor() {
    this.listadoParaCompartir = new Array<Juego>();
   }

  ngOnInit() {
  }
  CapturaEvento(juego:Juego){
    this.listadoParaCompartir.push(juego);
  }
}

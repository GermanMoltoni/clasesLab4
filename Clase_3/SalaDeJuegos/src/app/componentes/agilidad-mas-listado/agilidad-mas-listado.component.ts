import { Component, OnInit } from '@angular/core';
import {Juego} from '../../clases/juego';

@Component({
  selector: 'app-agilidad-mas-listado',
  templateUrl: './agilidad-mas-listado.component.html',
  styleUrls: ['./agilidad-mas-listado.component.css']
})
export class AgilidadMasListadoComponent implements OnInit {
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

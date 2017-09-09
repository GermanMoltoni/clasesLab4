import { Component, OnInit } from '@angular/core';
import {Juego} from '../../clases/juego';
import {AgilidadAritmetica } from '../../clases/agilidad-aritmetica';
import {AdivinaElNumero} from '../../clases/adivina-el-numero';
import { JuegosService } from '../../servicios/juegos.service';

@Component({
  selector: 'app-menu-de-listado',
  templateUrl: './menu-de-listado.component.html',
  styleUrls: ['./menu-de-listado.component.css']
})
export class MenuDeListadoComponent implements OnInit {
  listadoParaCompartir:Juego[];
  juegoService:JuegosService;
  constructor(service : JuegosService) {
    this.listadoParaCompartir = new Array<Juego>();
    this.juegoService = service;
   }
   ListarService(){
     this.listadoParaCompartir = this.juegoService.listar();
   }

  ngOnInit() {
  }

}

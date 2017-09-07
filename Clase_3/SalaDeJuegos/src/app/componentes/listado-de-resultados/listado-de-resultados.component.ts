import { Component, OnInit } from '@angular/core';
import {AgilidadAritmetica } from '../../clases/agilidad-aritmetica';
import {AdivinaElNumero} from '../../clases/adivina-el-numero';
import {Juego} from '../../clases/juego';

@Component({
  selector: 'app-listado-de-resultados',
  templateUrl: './listado-de-resultados.component.html',
  styleUrls: ['./listado-de-resultados.component.css']
})
export class ListadoDeResultadosComponent implements OnInit {
  private listado:Juego[];
  constructor() {
    this.listado = new Array();
    let j1 = new AgilidadAritmetica("Juego 1","Juan");
    j1.gano=false;
    this.listado.push(j1);
    let j2 = new AgilidadAritmetica("Juego 2","Carlos");
    j2.gano=false;
    this.listado.push(j2);
    let j3 = new AgilidadAritmetica("Juego 3","Diego");
    j3.gano=true;
    this.listado.push(j3);
    let j4 = new AdivinaElNumero("Juego 4","Martin");
    j4.gano=false;
    this.listado.push(j4);
    let j5 = new AdivinaElNumero("Juego 5","Pedro");
    j5.gano=false;
    
    this.listado.push(j5);   }

  ngOnInit() {
   }

}

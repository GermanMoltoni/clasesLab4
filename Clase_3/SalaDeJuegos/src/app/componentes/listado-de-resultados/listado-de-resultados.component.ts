import { Component, OnInit,Input } from '@angular/core';
import {AgilidadAritmetica } from '../../clases/agilidad-aritmetica';
import {AdivinaElNumero} from '../../clases/adivina-el-numero';
import {Juego} from '../../clases/juego';

@Component({
  selector: 'app-listado-de-resultados',
  templateUrl: './listado-de-resultados.component.html',
  styleUrls: ['./listado-de-resultados.component.css']
})
export class ListadoDeResultadosComponent implements OnInit {
  
  @Input() private listado:Juego[];// Pasa info de un componente a otro.
  constructor() {
    
     }

  ngOnInit() {
   }

}

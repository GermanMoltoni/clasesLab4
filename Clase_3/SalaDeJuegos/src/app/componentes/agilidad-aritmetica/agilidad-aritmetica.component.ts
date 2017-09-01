import { Component, OnInit } from '@angular/core';
import {AgilidadAritmetica } from '../../clases/agilidad-aritmetica';

@Component({
  selector: 'app-agilidad-aritmetica',
  templateUrl: './agilidad-aritmetica.component.html',
  styleUrls: ['./agilidad-aritmetica.component.css']
})
export class AgilidadAritmeticaComponent implements OnInit {
  private juego : AgilidadAritmetica;
  constructor() { 
    this.juego = new AgilidadAritmetica('Agilidad Aritmetica');
    
  }

  ngOnInit() {
  }

}

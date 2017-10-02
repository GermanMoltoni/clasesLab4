import { Component, OnInit,Input } from '@angular/core';
import {Persona} from '../../clases/persona';

@Component({
  selector: 'app-lista-personas',
  templateUrl: './lista-personas.component.html',
  styleUrls: ['./lista-personas.component.css']
})
export class ListaPersonasComponent implements OnInit {
  @Input() private personas:Persona[];
  constructor() { }
  
static Baja(mail:string){

}
  ngOnInit() {
  }

}

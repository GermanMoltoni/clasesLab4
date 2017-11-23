import { Component, OnInit } from '@angular/core';
import {Persona} from '../../clases/persona';
import {PersonaService} from '../../servicios/persona/persona.service';

@Component({
  selector: 'app-grilla-mapa',
  templateUrl: './grilla-mapa.component.html',
  styleUrls: ['./grilla-mapa.component.css']
})
export class GrillaMapaComponent implements OnInit {
  
  public datos:Persona[];
  constructor(public personaService:PersonaService) {
    this.datos
   }

  ngOnInit() {
    this.personaService.getLista().subscribe(res=>{this.datos = res;})
  }

}

import { Component, OnInit } from '@angular/core';
import {Persona} from '../../clases/persona';
import { PersonaService } from '../../servicios/persona.service';

@Component({
  selector: 'app-personas',
  templateUrl: './personas.component.html',
  styleUrls: ['./personas.component.css']
})
export class PersonasComponent implements OnInit {

  private listadoPersonas:Persona[];
  constructor(private personaService:PersonaService) { 
    this.personaService.Listar().then(datos=>console.log(datos)).catch();
  }

  ngOnInit() {
  }

}

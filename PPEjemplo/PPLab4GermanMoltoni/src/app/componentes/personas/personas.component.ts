import { Component, OnInit } from '@angular/core';
import {Persona} from '../../clases/persona';
import { PersonaService } from '../../servicios/persona.service';
import { Observable }     from 'rxjs/Observable';  

@Component({
  selector: 'app-personas',
  templateUrl: './personas.component.html',
  styleUrls: ['./personas.component.css']
})
export class PersonasComponent implements OnInit {

  //private listadoPersonas:Observable<Persona[]>;
  private listadoPersonas:Persona[];
  constructor(private personaService:PersonaService) { 
    //this.listadoPersonas = this.personaService.ListarObs();
     this.personaService.ListarProm().then((persona)=>{
      this.listadoPersonas = persona;
    });
  }
  AgregarPersona(persona:Persona){
    this.personaService.RegistrarPersona(persona);
    this.listadoPersonas.push(persona);
  }
  ngOnInit() {
    
  }

}

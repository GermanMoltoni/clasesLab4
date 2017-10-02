import { Component, OnInit,Output,EventEmitter } from '@angular/core';
import {Persona} from '../../clases/persona';

@Component({
  selector: 'app-form-alta-persona',
  templateUrl: './form-alta-persona.component.html',
  styleUrls: ['./form-alta-persona.component.css']
})
export class FormAltaPersonaComponent implements OnInit {
  private nombre:string;
  private sexo:string;
  private mail:string;
  private password:string;
  private persona:Persona;
  @Output() private altaPersona:EventEmitter<Persona> = new EventEmitter<Persona>();
  constructor() { }

  onClick(){
    this.persona = new Persona('german','M','asdasdasd','asdasdasd');
    this.altaPersona.emit(this.persona);
  }
  ngOnInit() {
  }

}

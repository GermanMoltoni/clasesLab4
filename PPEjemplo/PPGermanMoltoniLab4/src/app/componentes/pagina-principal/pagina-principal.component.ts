import { Component, OnInit ,Output,EventEmitter} from '@angular/core';
import { Validators, FormBuilder, FormControl, FormGroup } from '@angular/forms';
import {PersonaService} from '../../servicios/persona.service'
import {Persona} from '../../clases/persona';
function copiaClave(input: FormControl) {
  
        if (input.root.get('clv1') == null) {
          return null;
        }
  
        const verificar = input.root.get('clv1').value === input.value;
        return verificar ? null : { mismaClave : true };
    }
@Component({
  selector: 'app-pagina-principal',
  templateUrl: './pagina-principal.component.html',
  styleUrls: ['./pagina-principal.component.css']
})

export class PaginaPrincipalComponent implements OnInit {
  private compartirPersona:Persona;
   private personas:Persona[];
  constructor(private builder: FormBuilder,private personaService:PersonaService) { }
  email = new FormControl('', [
    Validators.required,
    Validators.minLength(5)
  ]);
  private check:boolean;
  nombre = new FormControl('', [
    Validators.required,
  ]);
  clv1 = new FormControl('', [
    Validators.required
  ]);
  clv2 = new FormControl('', [
    Validators.required,
    copiaClave
  ]);
  sexo = new FormControl('',[
    Validators.required,
  ])
  pathFoto = new FormControl('',[
    Validators.required,
  ])
  formRegistro: FormGroup = this.builder.group({
      email: this.email,
      clv1: this.clv1,
      clv2: this.clv2,
      nombre:this.nombre,
      sexo:this.sexo,
      pathFoto : this.pathFoto
  });

  ngOnInit() {
  }
  Listar(){
    //this.personaService.ListarProm().then(per=>{this.personas=per;});
    
  } 
  RegistrarPersona(){
    let nombre = this.formRegistro.get('nombre').value;
    let password = this.formRegistro.get('clv1').value;
    let mail = this.formRegistro.get('email').value;
    let pathFoto = this.formRegistro.get('pathFoto').value;
    let sexo =this.formRegistro.get('sexo').value;
    let persona = new Persona(nombre,sexo,mail,pathFoto,password);
    this.personaService.RegistrarPersona(persona);
  }
  ocultar(){
    this.check = !this.check;
  }
  BorrarPersona(persona:Persona){
    this.personaService.BorrarPersona(persona.id);
    this.compartirPersona = persona;
  }

}

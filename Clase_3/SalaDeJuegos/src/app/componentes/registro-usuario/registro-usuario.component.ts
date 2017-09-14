import { Component, OnInit } from '@angular/core';
import { FormsModule, Validators,FormBuilder,FormControl,FormGroup }   from '@angular/forms';
@Component({
  selector: 'app-registro-usuario',
  templateUrl: './registro-usuario.component.html',
  styleUrls: ['./registro-usuario.component.css']
})
export class RegistroUsuarioComponent implements OnInit {
  public inputUsuario:FormControl = new FormControl('',[Validators.required]);
  public inputMail:FormControl = new FormControl('',[Validators.required,Validators.minLength(5),Validators.email]);
  
  public inputPassword:FormControl = new FormControl('',[Validators.required,Validators.minLength(8)]);
  
  public registroForm:FormGroup = this.builder.group({});
  constructor(private builder:FormBuilder) { }

  ngOnInit() {
  }

}

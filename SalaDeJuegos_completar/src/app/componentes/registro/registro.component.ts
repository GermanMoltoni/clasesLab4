import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { FormsModule, Validators,FormBuilder,FormControl,FormGroup }   from '@angular/forms';
@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css']
})
export class RegistroComponent implements OnInit {

  public registroForm:FormGroup = this.builder.group({});
  public inputUsuario:FormControl = new FormControl('',[Validators.required]);
  public inputMail:FormControl = new FormControl('',[Validators.required,Validators.minLength(5),Validators.email]);
  
  public inputPassword:FormControl = new FormControl('',[Validators.required,Validators.minLength(8)]);
  constructor(private builder:FormBuilder) { }


  ngOnInit() {
  }

}

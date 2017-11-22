import { Component, OnInit} from '@angular/core';
import { ActivatedRoute,Router }   from '@angular/router';//rutas
import { FormsModule, Validators,FormBuilder,FormControl,FormGroup }   from '@angular/forms';
import { UsuariosService } from '../../servicios/usuarios/usuarios.service';
import { Usuario } from '../../clases/usuario';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  public password:FormControl = new FormControl('',[Validators.required,Validators.minLength(3)]);
  public mail:FormControl = new FormControl('',[Validators.required]);
  public registroForm:FormGroup = this.builder.group({
    mail : this.mail,
    password:this.password
  });
  constructor(public usService:UsuariosService,public router: Router,public builder:FormBuilder) { }

  ngOnInit() {
  }
  onClick(){
    let mail =  this.registroForm.get('mail').value;
    let password= this.registroForm.get('password').value;
    this.usService.Login({mail:mail,password:password})
  .then( data => {
    if ( data.token )
    {
      localStorage.setItem('token', data.token);
      this.router.navigateByUrl("/grilla");
    }
  })
  .catch( e => {
    console.info(e);
  } );
  }
  rellenar(){
    this.registroForm.setValue({mail:"german@prueba",password:"123 "});
   }


}

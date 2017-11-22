import { Component, OnInit} from '@angular/core';
import { ActivatedRoute,Router }   from '@angular/router';//rutas
import { FormsModule, Validators,FormBuilder,FormControl,FormGroup }   from '@angular/forms';
import { WsService } from '../../servicios/ws/ws.service';
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
  constructor(public ws:WsService,public router: Router,public builder:FormBuilder) { }

  ngOnInit() {
  }
  onClick(){
    let mail =  this.registroForm.get('mail').value;
    let password= this.registroForm.get('password').value;
    let usuario = new Usuario(mail,password)
    this.ws.post( {
      datosLogin: {
        mail: usuario.mail,
        password: usuario.password
    }} )
  .then( data => {
    console.info("data>>>",data);
    if ( data.token )
    {
      localStorage.setItem('token', data.token);
      this.router.navigateByUrl("/pagina2");
    }
  })
  .catch( e => {
    console.info(e);
  } );
  }
  rellenar(){
    this.registroForm.setValue({usuario:"carlos_uno",password:"123321123"});
   }


}

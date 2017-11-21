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
  public password:FormControl = new FormControl('',[Validators.required,Validators.minLength(8)]);
  public usuario:FormControl = new FormControl('',[Validators.required]);
  public registroForm:FormGroup = this.builder.group({
    usuario : this.usuario,
    password:this.password
  });
  constructor(public ws:WsService,public router: Router,public builder:FormBuilder) { }

  ngOnInit() {
  }
  onClick(){
    let us =  this.registroForm.get('usuario').value;
    let password= this.registroForm.get('password').value;
    let usuario = new Usuario(us,password)
    this.ws.post( {
      datosLogin: {
        usuario: usuario.usuario,
        clave: usuario.password
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

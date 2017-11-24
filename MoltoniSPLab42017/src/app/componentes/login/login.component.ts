import { Component, OnInit} from '@angular/core';
import { ActivatedRoute,Router }   from '@angular/router';//rutas
import { FormsModule, Validators,FormBuilder,FormControl,FormGroup }   from '@angular/forms';
import { EmpleadoService } from '../../servicios/empleado/empleado.service';
import { Empleado } from '../../clases/empleado';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    public nombre:FormControl = new FormControl('',[Validators.required]);
    public tipo:FormControl = new FormControl('',[Validators.required]);
    public password:FormControl = new FormControl('',[Validators.required]);
    
    public registroForm:FormGroup = this.builder.group({
        tipo : this.tipo,
        nombre:this.nombre,
        password:this.password
        
    });
    constructor(public empleadoService:EmpleadoService,public router: Router,public builder:FormBuilder) { }

    ngOnInit() {
    }
    onClick(){
        let nombre =  this.registroForm.get('nombre').value;
        let password =  this.registroForm.get('password').value;
        
        let tipo= this.registroForm.get('tipo').value;
        this.empleadoService.Login({tipo:tipo,nombre:nombre,password:password}).
            subscribe( data => {
                if ( data.token ){
                    localStorage.setItem('token', data.token);
                    this.router.navigateByUrl("/grilla");
                }
            });
    }
    rellenar(){
        this.registroForm.setValue({tipo:"jefe",nombre:"german",password:'123'});
    }


}

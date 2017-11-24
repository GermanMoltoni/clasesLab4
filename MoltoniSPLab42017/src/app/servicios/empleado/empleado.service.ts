import { Injectable } from '@angular/core';
import {MiHttpService} from '../mi-http/mi-http.service';
import { Observable }     from 'rxjs/Observable'; 
import {Empleado} from '../../clases/empleado';

@Injectable()
export class EmpleadoService {
  
  constructor(private http:MiHttpService) { }
  Traer():Observable<Empleado[]>{
      return this.http.Get('empleado') as Observable<Empleado[]>;
  }  
  Borrar(id:string){
    return this.http.Get('empleado/baja?id='+id);
    
  }
  Login(empleado){
    return this.http.Post('login',empleado);
  }
}

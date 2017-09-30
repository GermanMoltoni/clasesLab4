import { Injectable } from '@angular/core';
import { MiHttpService} from './mi-http.service';
import {Http,Response} from '@angular/http'; 
import 'rxjs/add/operator/toPromise';
@Injectable()
export class PersonaService {

  constructor(private http:MiHttpService) { 

  }
  Listar(){
    return this.http.DameUnaPromesa('http://localhost/clasesLab4/ParcialEjemplo_resuelto/Slim/index.php/persona');
  }

}

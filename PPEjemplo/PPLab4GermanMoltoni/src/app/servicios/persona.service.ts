import { Injectable } from '@angular/core';
import { MiHttpService} from './mi-http.service';
import {Http,Response} from '@angular/http'; 
import 'rxjs/add/operator/toPromise';
import {Persona} from '../clases/persona';
import { Observable }     from 'rxjs/Observable';  

@Injectable()
export class PersonaService {

  constructor(private http:MiHttpService) { 

  }
  ListarProm(){
    return this.http.DameUnaPromesa('http://localhost/clasesLab4/ParcialEjemplo_resuelto/Slim/index.php/persona');
  }
  ListarObs():Observable<Persona[]>{
   return this.http.DameUnObservable('http://localhost/clasesLab4/ParcialEjemplo_resuelto/Slim/index.php/persona') as Observable<Persona[]>;
}}


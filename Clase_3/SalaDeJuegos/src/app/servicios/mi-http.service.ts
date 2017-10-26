import { Injectable } from '@angular/core';
import {Http,Response} from '@angular/http'; 
import 'rxjs/add/operator/map'
import { Observable }     from 'rxjs/Observable'; 
@Injectable()
export class MiHttpService{
  
  constructor(public http:Http) { }
  DameUnObservable(path:string){
    return this.http.get(path).map(this.ExtraerDatos);
  }
  ManejadorDeError(error:Response|any){
    return error;
  }
  ExtraerDatos(respuesta:Response){
    return respuesta.json()||{};
  }
}

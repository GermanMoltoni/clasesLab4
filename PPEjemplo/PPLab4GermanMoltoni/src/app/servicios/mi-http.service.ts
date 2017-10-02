import { Injectable } from '@angular/core';
import {Http,Response} from '@angular/http'; 
import 'rxjs/add/operator/toPromise';
import { Observable }     from 'rxjs/Observable';  
import 'rxjs/add/operator/map'

@Injectable()
export class MiHttpService {

  constructor(public http:Http) { }
  DameUnaPromesa(url:string){
    return this.http.get(url)
    .toPromise().then(this.ExtraerDatos).catch(this.ManejadorDeError);
  }
  DameUnObservable(url:string){
    return this.http.get(url).map(this.ExtraerDatos);
  }
  ManejadorDeError(error:Response|any){
    return error;
  }
  ExtraerDatos(respuesta:Response){
    return respuesta.json()||{};
  }
}
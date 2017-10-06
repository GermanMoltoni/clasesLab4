import { Injectable } from '@angular/core';
import {Http,Response,Headers,RequestOptions} from '@angular/http'; 
import 'rxjs/add/operator/toPromise';
import { Observable }     from 'rxjs/Observable';  
import 'rxjs/add/operator/map'

@Injectable()
export class MiHttpService {
  public ruta:string;
  constructor(public http:Http) {
    this.ruta= 'http://localhost:8080/clasesLab4/MoltoniPPLab42017/Slim/';
   }
  DameUnaPromesa(url:string){
    return this.http.get(this.ruta+url)
    .toPromise().then(this.ExtraerDatos).catch(this.ManejadorDeError);
  }
  Post(url:string,body:any){
    let headers=new Headers();
    headers.append('Content-Type', 'application/json');
    return this.http.post(this.ruta+url,body,{ headers: headers })
    .toPromise()
    .then(this.ExtraerDatos)
    .catch(this.ManejadorDeError);
  }
  ManejadorDeError(error:Response|any){
    return error;
  }
  ExtraerDatos(respuesta:Response){
    return respuesta.json()||{};
  }
  Delete(url:string,id:number){
    return this.http.delete(url+'?id='+id)
    .toPromise()
    .then(this.ExtraerDatos)
    .catch(this.ManejadorDeError);
  }
}
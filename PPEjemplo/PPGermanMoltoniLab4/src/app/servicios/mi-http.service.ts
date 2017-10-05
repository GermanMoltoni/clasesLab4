import { Injectable } from '@angular/core';
import {Http,Response,Headers,RequestOptions} from '@angular/http'; 
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
  Post(url:string,body:any){
    let headers=new Headers();
    headers.append('Access-Control-Allow-Origin', 'http://localhost:4200');
    
    headers.append('Content-Type', 'application/json');
    headers.append('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    
    headers.append('Access-Control-Allow-Headers', 'Access-Control-Allow-Origin, Authorization');
    let options = new RequestOptions({ headers: headers })
    return this.http.post(url,body,options)
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
import { Injectable } from '@angular/core';
import {Http,Response,Headers} from '@angular/http'; import 'rxjs/add/operator/map'
import { Observable }     from 'rxjs/Observable'; 
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/toPromise';
import { AuthHttp } from 'angular2-jwt';
@Injectable()
export class MiHttpService{
  private url:string ='http://192.168.64.2/api.php';
  
  constructor(public http:Http, private authHttp: AuthHttp) { }
  Get(path:string){
    return this.http.get(this.url+'/'+path).map(this.ExtraerDatos);
  }
  Post(path:string,data:any){
    return this.http.post(this.url+'/'+path,data,{headers:new Headers({'Content-Type': 'application/json'})}).map(this.ExtraerDatos);
  }
  getJwt(path, user?: Object)
  {
    return this.authHttp.get(this.url+path, user).map(this.ExtraerDatos);
  }
  ManejadorDeError(error:Response|any){
    return error;
  }
  ExtraerDatos(respuesta:Response){
    return respuesta.json()||{};
  }
}

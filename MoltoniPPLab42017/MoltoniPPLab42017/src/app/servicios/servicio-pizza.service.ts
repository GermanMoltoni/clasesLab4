
import { Injectable } from '@angular/core';
import { MiHttpService} from './mi-http.service';
import {Http,Response} from '@angular/http'; 
import 'rxjs/add/operator/toPromise';
import {Pizza} from '../clases/pizza';
import { Observable }     from 'rxjs/Observable';  

@Injectable()
export class ServicioPizzaService {

  constructor(private http:MiHttpService) { 

  }
  ListarPizzas(){
    return this.http.DameUnaPromesa('pizza');
  }
  CrearPizzaService(pizza:Pizza){
  let data = 'sabor='+pizza.sabor+'&cantidad='+pizza.cantidad+'&tipo='+pizza.tipo+'&pathFoto='+pizza.pathFoto;
    console.log( this.http.DameUnaPromesa('pizza/alta?'+data));
  }

}
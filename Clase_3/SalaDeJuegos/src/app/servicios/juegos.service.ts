import { Injectable } from '@angular/core';
import {Juego} from '../Clases/juego';
import {AgilidadAritmetica } from '../clases/agilidad-aritmetica';
import {AdivinaElNumero} from '../clases/adivina-el-numero';
import {MiHttpService} from './mi-http.service';
@Injectable()
export class JuegosService {

  constructor(public miHttp:MiHttpService) { }
  
  listar():Juego[]{//https://www.mockaroo.com/ http://www.mocky.io/ 
      this.miHttp.DameUnaPromesa("http://www.mocky.io/v2/59bb277e0f00004707622a80").then(datos=>console.log(datos)).catch(error=>console.log(error));
//http://restcountries.eu/rest/v2/all
    let listadoParaCompartir = new Array<Juego>();
    let j1 = new AgilidadAritmetica("Juego 1","Juan");
    j1.gano=false;
    listadoParaCompartir.push(j1);
    let j2 = new AgilidadAritmetica("Juego 2","Carlos");
    j2.gano=false;
    listadoParaCompartir.push(j2);
    let j3 = new AgilidadAritmetica("Juego 3","Diego");
    j3.gano=true;
    listadoParaCompartir.push(j3);
    let j4 = new AdivinaElNumero("Juego 4","Martin");
    j4.gano=false;
    listadoParaCompartir.push(j4);
    let j5 = new AdivinaElNumero("Juego 5","Pedro");
    j5.gano=false;
    listadoParaCompartir.push(j5); 
    return listadoParaCompartir; 
  }

}

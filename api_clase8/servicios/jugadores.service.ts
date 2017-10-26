import { Injectable } from '@angular/core';
import { ArchivosJugadoresService}from './archivos-jugadores.service'
@Injectable()
export class JugadoresService {

  //peticion:any;
  constructor( public miHttp: ArchivosJugadoresService ) {
   // this.peticion = this.miHttp.traerJugadores();
//    this.peticion = this.miHttp.httpGetO("https://restcountries.eu/rest/v2/all");
  }


filtrado:any;

  traertodos(ruta : string,filtro: string) 
  {
      return this.miHttp.traerJugadores(ruta).then(data=>{
        console.info("jugadores service",data);

        this.filtrado=data;



      return this.filtrado;
        

      });
  }

}

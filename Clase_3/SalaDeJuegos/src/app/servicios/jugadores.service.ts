import { Injectable } from '@angular/core';
 import { MiHttpService} from './mi-http.service';
 import { Observable }     from 'rxjs/Observable'; 
 import{Jugador} from '../clases/jugador';
 
@Injectable()
export class JugadoresService {
  private url:string=  "http://localhost:8080/apirestjugadores/";
  constructor(private http : MiHttpService) { }
   public TraerJugadores(ruta:string):Observable<Jugador[]>{
      return this.http.DameUnObservable(this.url+ruta) as Observable<Jugador[]>;
  }
}

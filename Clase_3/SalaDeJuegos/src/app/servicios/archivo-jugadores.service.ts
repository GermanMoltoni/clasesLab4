import { JugadoresService } from './jugadores.service';
import { Injectable } from '@angular/core';
import 'rxjs/add/operator/filter';
import { Observable }     from 'rxjs/Observable'; 
import{Jugador} from '../clases/jugador';

@Injectable()
export class ArchivoJugadoresService {
  constructor(private jugadoresService:JugadoresService) { }
  public Filtrar(filtro:string,ruta:string){
    let jugadores;
    switch(filtro){
      case "ganadores":
        jugadores= this.jugadoresService.TraerJugadores(ruta).map(data=>data.filter(jugador => jugador.gano == true)) as Observable<Jugador[]>;
      break;
      case"perdedores":
        jugadores=this.jugadoresService.TraerJugadores(ruta).map(data=>data.filter(jugador => jugador.gano == false)) as Observable<Jugador[]>;
      break;
      default:
        jugadores= this.jugadoresService.TraerJugadores(ruta) as Observable<Jugador[]>;
      break;
    }
    return jugadores;
  }

}

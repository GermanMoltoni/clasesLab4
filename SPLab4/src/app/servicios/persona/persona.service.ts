import { Injectable } from '@angular/core';
import { WsService} from '../ws/ws.service';
import { Persona } from '../../clases/persona';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class PersonaService {
  constructor(public ws:WsService) { }
  getLista():Observable<Persona[]>{
      return this.ws.getJwt('personas');
  }
}

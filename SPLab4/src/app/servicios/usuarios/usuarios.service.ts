import { Injectable } from '@angular/core';
import { WsService} from '../ws/ws.service';
import { Usuario } from '../../clases/usuario';
@Injectable()
export class UsuariosService {
  constructor(public ws:WsService) { }
  Login(usuario:Usuario){
    return this.ws.post('login',usuario);
  }
}

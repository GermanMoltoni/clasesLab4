import { Component, OnInit } from '@angular/core';
import {ArchivoJugadoresService} from '../../servicios/archivo-jugadores.service';
@Component({
  selector: 'app-jugadores',
  templateUrl: './jugadores.component.html',
  styleUrls: ['./jugadores.component.css']
})
export class JugadoresComponent implements OnInit {
  public jugadores;
  constructor(private jugadoresFiltro :ArchivoJugadoresService) { }

  ngOnInit() {
    this.jugadores  = this.jugadoresFiltro.Filtrar("todos","jugadores/");
  }

}

import { Component, OnInit,Input } from '@angular/core';

@Component({
  selector: 'app-listar-jugadores',
  templateUrl: './listar-jugadores.component.html',
  styleUrls: ['./listar-jugadores.component.css']
})
export class ListarJugadoresComponent implements OnInit {
@Input() private jugadores;
  constructor() { }

  ngOnInit() {
  }

}

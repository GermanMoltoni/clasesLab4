import { Component, OnInit,Input } from '@angular/core';
import { Ng2SmartTableModule, LocalDataSource } from 'ng2-smart-table';

@Component({
  selector: 'app-listar-jugadores',
  templateUrl: './listar-jugadores.component.html',
  styleUrls: ['./listar-jugadores.component.css']
})
export class ListarJugadoresComponent implements OnInit {
@Input() private jugadores 
private data ;
  constructor() { }
  settings = {
    columns: {
      usuario: {
        title: 'ID'
      },
      cuit: {
        title: 'Full Name'
      },
      sexo: {
        title: 'User Name'
      },
      fecha: {
        title: 'Email'
      },
      gano: {
        title: 'Email'
      }
    }
  };
  ngOnInit() {
     this.jugadores.subscribe(datos=>{this.data = new LocalDataSource(datos) });
  }

}

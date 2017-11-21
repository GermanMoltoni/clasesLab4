import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-grilla-mapa',
  templateUrl: './grilla-mapa.component.html',
  styleUrls: ['./grilla-mapa.component.css']
})
export class GrillaMapaComponent implements OnInit {
  public datos=[
    {
      nombre:'Martin',
      apellido:'prueba',
      direccion:'avellaneda 34',
      sexo:'M',
      coordenadas:{lat:-34.603722,lng:-58.381592}
    }
  ];
  constructor() { }

  ngOnInit() {
  }

}

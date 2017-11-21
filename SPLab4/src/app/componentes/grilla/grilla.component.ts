import { Component, OnInit,Input } from '@angular/core';
import { Angular2Csv } from 'angular2-csv/Angular2-csv';
import { MiBotonComponent } from '../mi-boton/mi-boton.component';

@Component({
  selector: 'app-grilla',
  templateUrl: './grilla.component.html',
  styleUrls: ['./grilla.component.css']
})
export class GrillaComponent implements OnInit {
  @Input() datos:any[];
  public static optionsCsv = { 
    fieldSeparator: ',',
    quoteStrings: '"',
    decimalseparator: '.',
    showLabels: true, 
    showTitle: true,
    useBom: true
  };
  
  public settings = {
    mode:'inline',
    
    actions:{
      add:false,
      edit:false,
      delete:false
    },
    columns: {
      nombre:{
        title:'Nombre'
      },
      apellido:{
        title:'Apellido'
      },
      sexo: {
        editable:false,
        title: 'Sexo',
        valuePrepareFunction: (value) => { 
          return 'asd'
        }
      },
      direccion:{
        title:'Dirección'
      },
      coordenadas:{
        title:'Coordenadas',
        valuePrepareFunction: (value) => { 
          console.log(value)
          return 'lat:'+value.lat+' long:'+value.lng;
        }
      },
      button:{
        title:'Editar',
        type:'custom',
        renderComponent:MiBotonComponent
       }
  }};
  constructor() { }
  
    ngOnInit() {
    }
  exportar(){
    new Angular2Csv(this.datos,'listado',GrillaComponent.optionsCsv);
  }
}

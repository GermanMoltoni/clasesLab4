import { Component, OnInit,Input } from '@angular/core';
import { EdadPipe } from '../../pipes/edad.pipe';
import {EmpleadoService} from '../../servicios/empleado/empleado.service';
import { Ng2SmartTableModule, LocalDataSource } from 'ng2-smart-table';

@Component({
  selector: 'app-smart',
  templateUrl: './smart.component.html',
  styleUrls: ['./smart.component.css']
})
export class SmartComponent implements OnInit {

  @Input() public empleados;
  constructor(public empleadoService:EmpleadoService) { }
  settings = {
    mode:'inline',
    
    actions:{
      add:false,
      edit:false,
      delete:false
    },
    add:{confirmCreate:true},
    edit:{
      confirmSave:true
    },
    delete:{confirmDelete:true},
    columns: {
      nombre: {
        editable:false,
        title: 'Nombre',
      },
      edad: {
        editable:false,
        title: 'Edad',
        valuePrepareFunction: (value) => { 
          let pipe = new EdadPipe();
          return pipe.transform(value);
        }
      },
      tipo: {
        editable:false,
        title: 'Tipo'
      },
      pathFoto:{
        editable:false,
        title: 'Foto'
      }
    }
  };
  ngOnInit() {
    this.empleadoService.Traer()
    .subscribe(datos=>{this.empleados = new LocalDataSource(datos) });
    
  }

  

}


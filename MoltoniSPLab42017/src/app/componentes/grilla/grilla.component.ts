import { Component, OnInit,Input } from '@angular/core';
import {Empleado} from '../../clases/empleado';
import {EmpleadoService} from '../../servicios/empleado/empleado.service';

@Component({
  selector: 'app-grilla',
  templateUrl: './grilla.component.html',
  styleUrls: ['./grilla.component.css']
})
export class GrillaComponent implements OnInit {
@Input() public empleados;
  constructor(public empleadoService:EmpleadoService) { }

  ngOnInit() {
    this.empleados = this.empleadoService.Traer();
  }

}

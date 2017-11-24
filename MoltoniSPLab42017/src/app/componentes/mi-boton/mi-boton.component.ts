import { Component, OnInit,Input } from '@angular/core';
import {EmpleadoService} from '../../servicios/empleado/empleado.service';

@Component({
  selector: 'app-mi-boton',
  templateUrl: './mi-boton.component.html',
  styleUrls: ['./mi-boton.component.css']
})
export class MiBotonComponent implements OnInit {
  @Input() id;
  constructor(public empleadoService:EmpleadoService) { }

  ngOnInit() {
  }
  borrar(id){
    this.empleadoService.Borrar(id).subscribe(res=>{console.log(res)});
  }
}

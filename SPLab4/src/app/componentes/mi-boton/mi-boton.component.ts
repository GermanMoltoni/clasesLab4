import { Component, OnInit,Input } from '@angular/core';

@Component({
  selector: 'app-mi-boton',
  templateUrl: './mi-boton.component.html',
  styleUrls: ['./mi-boton.component.css']
})
export class MiBotonComponent implements OnInit {
  renderValue: string;
  
    @Input() value: string | number;
    @Input() rowData: any;
  constructor() { }

  ngOnInit() {
  }

}

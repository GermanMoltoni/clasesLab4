import { Component, OnInit,Input} from '@angular/core';

@Component({
  selector: 'app-mapa',
  templateUrl: './mapa.component.html',
  styleUrls: ['./mapa.component.css']
})
export class MapaComponent implements OnInit {
 @Input() public datos;
  public zoom: number;
  public latitud = -34.599722222222;
  public longitud = -58.381944444444;
  constructor() {}
  ngOnInit() {
    this.zoom = 4;
  }
   
}
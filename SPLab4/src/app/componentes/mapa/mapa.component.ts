import { Component, OnInit,Input} from '@angular/core';

@Component({
  selector: 'app-mapa',
  templateUrl: './mapa.component.html',
  styleUrls: ['./mapa.component.css']
})
export class MapaComponent implements OnInit {
 @Input() public datos;
  public zoom: number;
  constructor() {}
  ngOnInit() {
    this.zoom = 3;
  }
   
}
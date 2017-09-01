import { Component, OnInit } from '@angular/core';
import { Router }   from '@angular/router';//rutas

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {

  constructor(private router:Router) { }

  ngOnInit() {
  }
  Juego(nombre:string){
    switch (nombre) {
      case 'agilidad':
        this.router.navigate(['agilidad']);
        break;
      case 'adivina':
        this.router.navigate(['adivina']);
        break;
      default:
        break;
    }
  }
}

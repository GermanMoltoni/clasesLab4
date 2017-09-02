import { Component, OnInit } from '@angular/core';
import { ActivatedRoute,Router }   from '@angular/router';//rutas

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {
  public login:boolean;
  constructor(private route: ActivatedRoute,
    private router: Router) { }

    ngOnInit() {
      if(localStorage.getItem('token') == 'true')
        this.login=true;
      else
        this.router.navigate(['login']);
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

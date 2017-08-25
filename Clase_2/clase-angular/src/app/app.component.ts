import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Clase Angular';
  // Instalar bootstrap y modificara .angular-cli.json para incluir el archivo
  //ng g component componentes/login
  //inputs [(ngModel)]="usuario" [ngModelOptions]="{standalone: true}    [()] bidireccional, puedo obtener valores o asignar desde la clase  "
  // para agregar imagenes poner en assets de .angular-cli.json
}

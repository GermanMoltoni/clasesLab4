import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { PizzasListadoComponent } from './componentes/pizzas-listado/pizzas-listado.component';
import { ServicioPizzaService } from './servicios/servicio-pizza.service';
import { MiHttpService } from './servicios/mi-http.service';
import {HttpModule} from '@angular/http';
import { PizzaComponent } from './componentes/pizza/pizza.component';
import { RegistroPizzaComponent } from './componentes/registro-pizza/registro-pizza.component';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    PizzasListadoComponent,
    PizzaComponent,
    RegistroPizzaComponent
  ],
  imports: [
    BrowserModule,HttpModule,ReactiveFormsModule,FormsModule
  ],
  providers: [MiHttpService,ServicioPizzaService],
  bootstrap: [AppComponent]
})
export class AppModule { }

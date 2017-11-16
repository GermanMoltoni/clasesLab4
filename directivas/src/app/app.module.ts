import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { PruebaComponent } from './componentes/prueba/prueba.component';
import { DirectivaDirective } from './directivas/directiva.directive';
import { DirectivadosDirective } from './directivas/directivados.directive';
import { DirectivatresDirective } from './directivas/directivatres.directive';


@NgModule({
  declarations: [
    AppComponent,
    PruebaComponent,
    DirectivaDirective,
    DirectivadosDirective,
    DirectivatresDirective
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

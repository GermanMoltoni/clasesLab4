import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { PruebaComponent } from './componentes/prueba/prueba.component';
import { DirectivaDirective } from './directivas/directiva.directive';
import { DirectivadosDirective } from './directivas/directivados.directive';
import { DirectivatresDirective } from './directivas/directivatres.directive';
import { DirectivaCuatroDirective } from './directivas/directiva-cuatro.directive';


@NgModule({
  declarations: [
    AppComponent,
    PruebaComponent,
    DirectivaDirective,
    DirectivadosDirective,
    DirectivatresDirective,
    DirectivaCuatroDirective
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

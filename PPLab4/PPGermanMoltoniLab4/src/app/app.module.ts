import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { MostrarPersonaComponent } from './componentes/mostrar-persona/mostrar-persona.component';
import { PaginaPrincipalComponent } from './componentes/pagina-principal/pagina-principal.component';

import { PersonaService } from './servicios/persona.service';
import { MiHttpService } from './servicios/mi-http.service';
import {HttpModule} from '@angular/http';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    MostrarPersonaComponent,
    PaginaPrincipalComponent
  ],
  imports: [
    BrowserModule,HttpModule,ReactiveFormsModule,FormsModule
  ],
  providers: [MiHttpService,PersonaService],
  bootstrap: [AppComponent]
})
export class AppModule { }

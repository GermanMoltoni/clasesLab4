import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {HttpModule} from '@angular/http';

import { AppComponent } from './app.component';
import { ListaPersonasComponent } from './componentes/lista-personas/lista-personas.component';
import { PersonasComponent } from './componentes/personas/personas.component';
import { PersonaService } from './servicios/persona.service';
import { MiHttpService } from './servicios/mi-http.service';
import { FormAltaPersonaComponent } from './componentes/form-alta-persona/form-alta-persona.component';

@NgModule({
  declarations: [
    AppComponent,
    ListaPersonasComponent,
    PersonasComponent,
    FormAltaPersonaComponent
  ],
  imports: [
    BrowserModule,HttpModule
  ],
  providers: [MiHttpService,PersonaService],
  bootstrap: [AppComponent]
})
export class AppModule { }

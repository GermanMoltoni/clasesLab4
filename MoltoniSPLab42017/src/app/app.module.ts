import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { Ng2SmartTableModule } from 'ng2-smart-table';


import { AppComponent } from './app.component';
//Servicios
import { MiHttpService } from './servicios/mi-http/mi-http.service'; 
import { EmpleadoService } from './servicios/empleado/empleado.service';
import { GrillaComponent } from './componentes/grilla/grilla.component'; 
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

//modulos
import {HttpModule} from '@angular/http';
import { JwtModule } from './modulos/jwt/jwt.module';
import { RutasModule } from './modulos/rutas/rutas.module';

import { MiBotonComponent } from './componentes/mi-boton/mi-boton.component';
import { LoginComponent } from './componentes/login/login.component';
import { PaginaPrincipalComponent } from './componentes/pagina-principal/pagina-principal.component';
import { AltaComponent } from './componentes/alta/alta.component';
import { EdadPipe } from './pipes/edad.pipe';
import { TipoDirective } from './directivas/tipo.directive';
import { SmartComponent } from './componentes/smart/smart.component';

@NgModule({
  declarations: [
    AppComponent,
    GrillaComponent,
    MiBotonComponent,
    LoginComponent,
    PaginaPrincipalComponent,
    AltaComponent,
    EdadPipe,
    TipoDirective,
    SmartComponent,
  ],
  imports: [
    BrowserModule,HttpModule,JwtModule,FormsModule,Ng2SmartTableModule, ReactiveFormsModule,RutasModule
  ],
  providers: [MiHttpService,EmpleadoService],
  bootstrap: [AppComponent]
})
export class AppModule { }

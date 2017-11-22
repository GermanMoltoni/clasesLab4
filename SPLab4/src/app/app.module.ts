import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { AgmCoreModule, MapsAPILoader, GoogleMapsAPIWrapper } from 'angular2-google-maps/core';
import { Ng2SmartTableModule } from 'ng2-smart-table';

import { AppComponent } from './app.component';
import { MapaComponent } from './componentes/mapa/mapa.component';
import { GoogleMapDirective } from './directivas/google-map.directive';
import { GrillaComponent } from './componentes/grilla/grilla.component';
import { RutaMapaComponent } from './componentes/ruta-mapa/ruta-mapa.component';
import { SexoPipe } from './pipes/sexo.pipe';
import { MiBotonComponent } from './componentes/mi-boton/mi-boton.component';
import { GrillaMapaComponent } from './componentes/grilla-mapa/grilla-mapa.component';
import { RutasModule } from './modulos/rutas/rutas.module';
import { JwtModule } from './modulos/jwt/jwt.module';

import { LoginComponent } from './componentes/login/login.component';
import { UsuariosService }  from './servicios/usuarios/usuarios.service';

import { WsService }  from './servicios/ws/ws.service';
import { AuthService } from './servicios/auth/auth.service';
import { VerificarJwtService } from './servicios/verificar-jwt/verificar-jwt.service';
@NgModule({
  declarations: [
    AppComponent,
    MapaComponent,
    GoogleMapDirective,
    GrillaComponent,
    RutaMapaComponent,
    SexoPipe,
    MiBotonComponent,
    GrillaMapaComponent,
    LoginComponent
  ],
  imports: [
    BrowserModule,FormsModule, ReactiveFormsModule, Ng2SmartTableModule,AgmCoreModule.forRoot({
      apiKey: 'AIzaSyAICvI-uyTaJcvApdz7vSKffB7twN6K3wk',
      libraries: ["places"]
    }),RutasModule,JwtModule
  ],
  providers: [GoogleMapsAPIWrapper,UsuariosService,WsService,
    AuthService,
    VerificarJwtService],
  bootstrap: [AppComponent],
  entryComponents:[MiBotonComponent]
})
export class AppModule { }

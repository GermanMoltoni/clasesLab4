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
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { LoginComponent } from './componentes/login/login.component';
import { PersonaService }  from './servicios/persona/persona.service';
import { UsuariosService }  from './servicios/usuarios/usuarios.service';

import { WsService }  from './servicios/ws/ws.service';
import { AuthService } from './servicios/auth/auth.service';
import { VerificarJwtService } from './servicios/verificar-jwt/verificar-jwt.service';
import { MenuPrincipalComponent } from './componentes/menu-principal/menu-principal.component';
import { MenuComponent } from './componentes/menu/menu.component';
import { PaginaPrincipalComponent } from './componentes/pagina-principal/pagina-principal.component';
import { PaginaSecundariaComponent } from './componentes/pagina-secundaria/pagina-secundaria.component';
import { ErrorComponent } from './componentes/error/error.component';
import { MiBotonDirective } from './directivas/mi-boton/mi-boton.directive';
import {MatButtonModule, MatFormField} from '@angular/material';
import {MatDialogModule} from '@angular/material';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {MatRadioModule} from '@angular/material/radio';

import { ModalComponent } from './componentes/modal/modal.component';
import { MiFormularioDirective } from './directivas/mi-formulario/mi-formulario.directive';
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
    LoginComponent,
    MenuPrincipalComponent,
    MenuComponent,
    PaginaPrincipalComponent,
    PaginaSecundariaComponent,
    ErrorComponent,
    MiBotonDirective,
    ModalComponent,
    MiFormularioDirective
  ],
  imports: [
    BrowserModule,FormsModule, ReactiveFormsModule, Ng2SmartTableModule,AgmCoreModule.forRoot({
      apiKey: '',
      libraries: ["places"]
    }),RutasModule,JwtModule,MatButtonModule,MatDialogModule,BrowserAnimationsModule,MatFormFieldModule,MatInputModule,
    MatRadioModule
  ],
  providers: [GoogleMapsAPIWrapper,UsuariosService,WsService,
    AuthService,
    VerificarJwtService,PersonaService],
  bootstrap: [AppComponent],
  entryComponents:[MiBotonComponent,ModalComponent]
})
export class AppModule { }

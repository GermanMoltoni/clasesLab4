import { ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule}   from '@angular/forms';
import { RouterModule,Routes }   from '@angular/router';//rutas
import { JuegosService } from './servicios/juegos.service';
import { RutasModule } from './modulos/rutas/rutas.module';
import {HttpModule} from '@angular/http';
import { AppComponent } from './app.component';
import { AdivinaElNumeroComponent } from './componentes/adivina-el-numero/adivina-el-numero.component';
import { AgilidadAritmeticaComponent } from './componentes/agilidad-aritmetica/agilidad-aritmetica.component';
import { MenuComponent } from './componentes/menu/menu.component';
import { LoginComponent } from './componentes/login/login.component';
import { ErrorComponent } from './componentes/error/error.component';
import { ListadoDeResultadosComponent } from './componentes/listado-de-resultados/listado-de-resultados.component';
import { MenuDeListadoComponent } from './componentes/menu-de-listado/menu-de-listado.component';
import { AdivinaMasListadoComponent } from './componentes/adivina-mas-listado/adivina-mas-listado.component';
import { AgilidadMasListadoComponent } from './componentes/agilidad-mas-listado/agilidad-mas-listado.component';
import { PiedraPapelOTijeraComponent } from './componentes/piedra-papel-otijera/piedra-papel-otijera.component';
import { ReflejosDaltonicosComponent } from './componentes/reflejos-daltonicos/reflejos-daltonicos.component';
import { RegistroUsuarioComponent } from './componentes/registro-usuario/registro-usuario.component';
import { RecuperarPasswordComponent } from './componentes/recuperar-password/recuperar-password.component';
import { MiHttpService } from './servicios/mi-http.service';
import { JuegosComponent } from './componentes/juegos/juegos.component';

@NgModule({
  declarations: [
    AppComponent,
    AdivinaElNumeroComponent,
    AgilidadAritmeticaComponent,
    MenuComponent,
    LoginComponent,
    ErrorComponent,
    ListadoDeResultadosComponent,
    MenuDeListadoComponent,
    AdivinaMasListadoComponent,
    AgilidadMasListadoComponent,
    PiedraPapelOTijeraComponent,
    ReflejosDaltonicosComponent,
    RegistroUsuarioComponent,
    RecuperarPasswordComponent,
    JuegosComponent,

    
  ],
  imports: [
    BrowserModule,FormsModule,RutasModule,ReactiveFormsModule,HttpModule
  ],
  providers: [JuegosService,MiHttpService],
  bootstrap: [AppComponent]
})
export class AppModule { }

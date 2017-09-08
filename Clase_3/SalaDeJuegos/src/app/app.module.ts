import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule }   from '@angular/forms';
import { RouterModule,Routes }   from '@angular/router';//rutas
import { JuegosService } from './servicios/juegos.service';

import { AppComponent } from './app.component';
import { AdivinaElNumeroComponent } from './componentes/adivina-el-numero/adivina-el-numero.component';
import { AgilidadAritmeticaComponent } from './componentes/agilidad-aritmetica/agilidad-aritmetica.component';
import { MenuComponent } from './componentes/menu/menu.component';
import { LoginComponent } from './componentes/login/login.component';
import { ErrorComponent } from './componentes/error/error.component';
import { ListadoDeResultadosComponent } from './componentes/listado-de-resultados/listado-de-resultados.component';
import { MenuDeListadoComponent } from './componentes/menu-de-listado/menu-de-listado.component';
let routes: Routes = [
  {path:'adivina',component:AdivinaElNumeroComponent},
  {path:'agilidad',component:AgilidadAritmeticaComponent},
  {path:'menu',component:MenuComponent},
  {path:'listadoresultados',component:ListadoDeResultadosComponent},
    {path:'menulistado',component:MenuDeListadoComponent},

  {path:'login',component:LoginComponent},
 // {path:'',component:ErrorComponent},
];
@NgModule({
  declarations: [
    AppComponent,
    AdivinaElNumeroComponent,
    AgilidadAritmeticaComponent,
    MenuComponent,
    LoginComponent,
    ErrorComponent,
    ListadoDeResultadosComponent,
    MenuDeListadoComponent
  ],
  imports: [
    BrowserModule,FormsModule,RouterModule.forRoot(routes)
  ],
  providers: [JuegosService],
  bootstrap: [AppComponent]
})
export class AppModule { }

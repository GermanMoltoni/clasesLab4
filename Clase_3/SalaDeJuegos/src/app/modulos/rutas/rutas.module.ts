import { NgModule } from '@angular/core';
 
import { RouterModule,Routes }   from '@angular/router';//rutas
 

 
import { AdivinaElNumeroComponent } from '../../componentes/adivina-el-numero/adivina-el-numero.component';
import { AgilidadAritmeticaComponent } from '../../componentes/agilidad-aritmetica/agilidad-aritmetica.component';
import { MenuComponent } from '../../componentes/menu/menu.component';
import { LoginComponent } from '../../componentes/login/login.component';
import { ErrorComponent } from '../../componentes/error/error.component';
import { ListadoDeResultadosComponent } from '../../componentes/listado-de-resultados/listado-de-resultados.component';
import { MenuDeListadoComponent } from '../../componentes/menu-de-listado/menu-de-listado.component';
import { AdivinaMasListadoComponent } from '../../componentes/adivina-mas-listado/adivina-mas-listado.component';
import { AgilidadMasListadoComponent } from '../../componentes/agilidad-mas-listado/agilidad-mas-listado.component';
const routes: Routes = [
  {path:'adivina',component:AdivinaElNumeroComponent},
   {path:'agilidad',component:AgilidadAritmeticaComponent},
  {path:'menu',component:MenuComponent},
  {path:'listadoresultados',component:ListadoDeResultadosComponent},
    {path:'menulistado',component:MenuDeListadoComponent},
    {path:'agilidadmaslistado',component:AgilidadMasListadoComponent},
    {path:'adivinamaslistado',component:AdivinaMasListadoComponent},

  {path:'login',component:LoginComponent}, 
 // {path:'',component:ErrorComponent},
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class RutasModule { }

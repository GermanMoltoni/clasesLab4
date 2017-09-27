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
import { PiedraPapelOTijeraComponent } from '../../componentes/piedra-papel-otijera/piedra-papel-otijera.component';
import { ReflejosDaltonicosComponent } from '../../componentes/reflejos-daltonicos/reflejos-daltonicos.component';

import { RecuperarPasswordComponent } from '../../componentes/recuperar-password/recuperar-password.component';
import { RegistroUsuarioComponent } from '../../componentes/registro-usuario/registro-usuario.component';
import { JuegosComponent } from '../../componentes/juegos/juegos.component';

const routes: Routes = [
  {path:'juegos',component:JuegosComponent,
  children:[
    {path:'adivina',component:AdivinaElNumeroComponent},
    {path:'agilidad',component:AgilidadAritmeticaComponent},
    {path:'piedrapapelotijera',component:PiedraPapelOTijeraComponent}, 
    {path:'reflejosdaltonicos',component:ReflejosDaltonicosComponent}, 
  ]},
  
   
  {path:'menu',component:MenuComponent},
  {path:'listadoresultados',component:ListadoDeResultadosComponent},
    {path:'menulistado',component:MenuDeListadoComponent},
    {path:'agilidadmaslistado',component:AgilidadMasListadoComponent},
    {path:'adivinamaslistado',component:AdivinaMasListadoComponent},
 
  
  {path:'login',component:LoginComponent},
  {path:'recuperarpassword',component:RecuperarPasswordComponent}, 
  {path:'registrarusuario',component:RegistroUsuarioComponent}, 
  
 // {path:'',component:ErrorComponent},
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class RutasModule { }

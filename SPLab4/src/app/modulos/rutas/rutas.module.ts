import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
//----------------------------------
import { RouterModule,Routes }   from '@angular/router';//rutas
import { VerificarJwtService } from '../../servicios/verificar-jwt/verificar-jwt.service';
//---------------------------------
import { LoginComponent } from '../../componentes/login/login.component';

import { GrillaComponent } from '../../componentes/grilla/grilla.component';
import { GrillaMapaComponent } from '../../componentes/grilla-mapa/grilla-mapa.component';
//---------------------------------
const routes: Routes = [
  /*{path:' ',component: ,
  children:[
    {path:'grilla',component:GrillaComponent},

     
  ]},*/
  {path:'grilla',component:GrillaComponent, canActivate: [VerificarJwtService],}
  {path:'login',component:LoginComponent}
  
];
//-------------------
@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class RutasModule { }
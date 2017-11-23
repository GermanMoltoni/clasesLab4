import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
//----------------------------------
import { RouterModule,Routes }   from '@angular/router';//rutas
import { VerificarJwtService } from '../../servicios/verificar-jwt/verificar-jwt.service';
//---------------------------------
import { LoginComponent } from '../../componentes/login/login.component';
import { PaginaSecundariaComponent } from '../../componentes/pagina-secundaria/pagina-secundaria.component';
import { PaginaPrincipalComponent } from '../../componentes/pagina-principal/pagina-principal.component';

import { GrillaComponent } from '../../componentes/grilla/grilla.component';
import { GrillaMapaComponent } from '../../componentes/grilla-mapa/grilla-mapa.component';
//---------------------------------
const routes: Routes = [
  {path:'secundaria',component:PaginaSecundariaComponent ,canActivate:[VerificarJwtService],
  children:[
    {path:'grilla',component:GrillaMapaComponent},
  ]},
   {path:'login',component:LoginComponent},
   {path:'',component:PaginaPrincipalComponent}
   
];
//-------------------
@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class RutasModule { }
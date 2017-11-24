import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
//----------------------------------
import { RouterModule,Routes }   from '@angular/router';//rutas

import { LoginComponent } from '../../componentes/login/login.component';
import { GrillaComponent } from '../../componentes/grilla/grilla.component';
import { SmartComponent} from '../../componentes/smart/smart.component';

import { PaginaPrincipalComponent} from '../../componentes/pagina-principal/pagina-principal.component';
//---------------------------------
const routes: Routes = [

   {path:'login',component:LoginComponent},
   {path:'grilla',component:GrillaComponent},
   {path:'smart',component:SmartComponent},
   
   {path:'',component:PaginaPrincipalComponent},
   
];
//-------------------
@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class RutasModule { }
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule,ReactiveFormsModule}   from '@angular/forms';

import { AppComponent } from './app.component';

// Servicios
import { WsService }  from './servicios/ws/ws.service';
import { AuthService } from './servicios/auth/auth.service';
import { VerificarJwtService } from './servicios/verificar-jwt/verificar-jwt.service';
import { JwtModule } from './jwt/jwt.module';
import { ErrorComponent } from './componentes/error/error.component';
import { LoginComponent } from './componentes/login/login.component';
import { Pagina1Component } from './componentes/pagina1/pagina1.component';
import { Pagina2Component } from './componentes/pagina2/pagina2.component';
import { MenuComponent } from './componentes/menu/menu.component';


const appRoutes: Routes = [
  {
    path: 'pagina1',
    canActivate: [VerificarJwtService],
    component: Pagina1Component
  },
  { path: 'pagina2', component: Pagina2Component, canActivate: [VerificarJwtService], },
  { path: 'login', component: LoginComponent },
  { path: '',   redirectTo: '/pagina1', pathMatch: 'full' },
  { path: '**', component: ErrorComponent }
];
@NgModule({
  declarations: [
    AppComponent,
    ErrorComponent,
    LoginComponent,
    Pagina1Component,
    Pagina2Component,
    MenuComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    HttpModule,
    JwtModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [
    WsService,
    AuthService,
    VerificarJwtService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

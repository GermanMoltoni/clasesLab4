import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { SimpleDemoComponent } from './components/simple-demo/simple-demo.component';
import {  FileUploadModule } from 'ng2-file-upload';

@NgModule({
  declarations: [
    AppComponent,
    SimpleDemoComponent  ],
  imports: [
    BrowserModule,FileUploadModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

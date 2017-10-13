import { Component } from '@angular/core';
import { FileUploader } from 'ng2-file-upload';
 
// const URL = '/api/';
const URL = 'http://localhost:8080/archivo/prueba.php';
 
@Component({
  selector: 'simple-demo',
  templateUrl: './simple-demo.component.html'
})
export class SimpleDemoComponent {
  public uploader:FileUploader = new FileUploader({url: URL});
  public hasBaseDropZoneOver:boolean = false;
  public hasAnotherDropZoneOver:boolean = false;
 
  public fileOverBase(e:any):void {
    this.hasBaseDropZoneOver = e;
  }
 
  public fileOverAnother(e:any):void {
    this.hasAnotherDropZoneOver = e;
  }
}
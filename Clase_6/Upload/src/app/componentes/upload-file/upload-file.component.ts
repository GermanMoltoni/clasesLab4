import { Component, OnInit} from '@angular/core';
import { FileUploader } from 'ng2-file-upload';
 
// const URL = '/api/';
const URL = 'http://localhost/clasesLab4/Clase_6/api/imagen';
@Component({
  selector: 'app-upload-file',
  templateUrl: './upload-file.component.html',
  styleUrls: ['./upload-file.component.css']
})
export class UploadFileComponent implements OnInit {
  public foto:any;
  public uploader:FileUploader = new FileUploader({url: URL});
  public hasBaseDropZoneOver:boolean = false;
  public hasAnotherDropZoneOver:boolean = false;
 
  public fileOverBase(e:any):void {
    this.hasBaseDropZoneOver = e;
  }
 
  public fileOverAnother(e:any):void {
    this.hasAnotherDropZoneOver = e;
  }
  ngOnInit(){
    this.foto = ''
    
    this.uploader.onCompleteItem = (item:any, response:any, status:any, headers:any) => {
    if(JSON.parse(response).imagen != undefined)
        this.foto= JSON.parse(response).imagen;//respuesta de servidor
   };
  }
}
